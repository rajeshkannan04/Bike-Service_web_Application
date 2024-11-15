<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeService extends Model
{
    use HasFactory;
    protected $table = 'bike_services';
    protected $fillable = [
        'users_id',
        'shop_owners_id',
        'bikebrand',
        'bikemodel',
        'bookingDate',
        'deliverDate',
        'city',
        'service1',
        'service2',
        'service3',
        'service4',
        'service5',
        'additional',
        'status',
    ];
}
