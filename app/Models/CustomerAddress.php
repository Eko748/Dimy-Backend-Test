<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;
    protected $table = 'customer_address';
    protected $guarded = [];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

}
