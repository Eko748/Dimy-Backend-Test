<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $guarded = [];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function order() {
        return $this->belongsToMany(Order::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }

    public function paymentMethods() {
        return $this->belongsToMany(PaymentMethod::class);
    }
}
