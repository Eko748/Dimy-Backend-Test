<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $guarded = [];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function address() {
        return $this->hasOne(CustomerAddress::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
