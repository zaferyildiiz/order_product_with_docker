<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\DiscountRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function calculateDiscount(Request $request)
    {
        // Geçerli sipariş ID'sini alıyoruz
        $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        $order = Order::with('items.product')->findOrFail($request->order_id);
        $total = $order->total; // Siparişin toplamı
        $discounts = [];
        $discountedTotal = $total;

        // İndirim kurallarını çekiyoruz
        $discountRules = DiscountRule::all();

        foreach ($discountRules as $rule) {
            $discountAmount = 0;
            // Min alışveriş tutarı varsa, kontrol ediyoruz
            if ($rule->min_purchase_amount && $total >= $rule->min_purchase_amount) {
                // Yüzde bazlı indirim varsa, hesaplıyoruz
                if ($rule->discount_percentage) {
                    $discountAmount = $total * ($rule->discount_percentage / 100);
                }
            }

            if ($discountAmount > 0) {
                $discountedTotal -= $discountAmount;

                // İndirimleri kayıt altına alıyoruz
                $discounts[] = [
                    'discountReason' => $rule->rule_name,
                    'discountAmount' => number_format($discountAmount, 2),
                    'subtotal' => number_format($discountedTotal, 2),
                ];
            }
        }

        $totalDiscount = $total - $discountedTotal;

        return response()->json([
            'orderId' => $order->id,
            'discounts' => $discounts,
            'totalDiscount' => number_format($totalDiscount, 2),
            'discountedTotal' => number_format($discountedTotal, 2),
        ]);
    }
}
