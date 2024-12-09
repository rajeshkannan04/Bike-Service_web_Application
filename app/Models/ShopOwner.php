<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOwner extends Model
{
    use HasFactory;
    protected $table = 'shop_owners';
    protected $fillable = [
        'users_id',
        'shopName',
        'address',
        'city',
        'service1',
        'rate1',
        'service2',
        'rate2',
        'service3',
        'rate3',
        'service4',
        'rate4',
        'service5',
        'rate5',
    ];
}
