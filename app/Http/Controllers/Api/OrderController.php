<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller {
 
    public function index() { 
        $orders = Order::with('items.product')->get();
        return response()->json($orders);
    }

    public function save_order(Request $request) { 
        try {
            $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'items' => 'required|array',
                'items.*.product_id' => 'required|exists:products,id',
                'items.*.quantity' => 'required|integer|min:1',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'message' => $e->errors()
            ], 422);
        }

        DB::beginTransaction();
        try { 
            $order = Order::create([
                'customer_id' => $request->customer_id,
                'total' => 0,  
            ]);
            $total = 0; 
            foreach ($request->items as $item) {
                $product = Product::find($item['product_id']); 
                if ($product->stock < $item['quantity']) {
                    return response()->json(['error' => 'Stok yetersiz: ' . $product->name], 400);
                } 
                $product->decrement('stock', $item['quantity']); 
                $orderItem = $order->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->price,
                    'total' => $item['quantity'] * $product->price,
                ]); 
                $total += $orderItem->total;
            } 
            $order->update(['total' => $total]);
            DB::commit();
            return response()->json($order, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update_order(Request $request, $order_id) {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);
        $order = Order::findOrFail($order_id);
        DB::beginTransaction();
        try {
            $order->update([
                'customer_id' => $request->customer_id,
                'total' => 0,
            ]);
            
            $total = 0; 
            foreach ($request->items as $item) {
                $product = Product::find($item['product_id']);
                if ($product->stock < $item['quantity']) {
                    return response()->json(['error' => 'Stok yetersiz: ' . $product->name], 400);
                }
                $product->decrement('stock', $item['quantity']);
                
                $orderItem = $order->items()->updateOrCreate(
                    ['product_id' => $item['product_id']],
                    [
                        'quantity' => $item['quantity'],
                        'unit_price' => $product->price,
                        'total' => $item['quantity'] * $product->price,
                    ]
                );
                $total += $orderItem->total;
            }
            $order->update(['total' => $total]);
    
            DB::commit();
            return response()->json($order, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function delete_order($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->items()->delete();
        $order->delete();
        return response()->json(['message' => 'Sipariş ve öğeleri başarıyla silindi.']);
    }
}
