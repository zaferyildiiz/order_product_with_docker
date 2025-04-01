<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountRule extends Model
{
    protected $casts = [
        'conditions' => 'array', // Koşullar bir array olarak saklanacak
    ];
}
