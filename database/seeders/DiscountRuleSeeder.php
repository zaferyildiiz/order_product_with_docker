<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiscountRule;

class DiscountRuleSeeder extends Seeder
{
    public function run()
    {
        // İndirim kurallarını oluşturuyoruz
        DiscountRule::create([
            'rule_name' => '10_PERCENT_OVER_1000',
            'discount_percentage' => 10,
            'min_purchase_amount' => 1000,
            'conditions' => json_encode([]),  // Koşul yok, tüm siparişler geçerli
        ]);

        DiscountRule::create([
            'rule_name' => 'BUY_6_GET_1_FREE',
            'discount_percentage' => 0,  // Ücretsiz ürün verilecek, bu yüzden oran 0
            'min_purchase_amount' => 0,  // Alışveriş tutarı kısıtlaması yok
            'conditions' => json_encode(['category_ids' => [2]]),  // 2 ID'li kategori için geçerli
        ]);

        DiscountRule::create([
            'rule_name' => '20_PERCENT_DISCOUNT_ON_CHEAPEST',
            'discount_percentage' => 20,
            'min_purchase_amount' => 0,  // Alışveriş tutarı kısıtlaması yok
            'conditions' => json_encode(['category_ids' => [1]]),  // 1 ID'li kategori için geçerli
        ]);
    }
}