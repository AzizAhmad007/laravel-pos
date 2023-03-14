<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'cashier_id',
        'customer_id',
        'product_id',
        'qty',
        'price',
    ];

    protected $guarded = ['id'];

    public function getcustomer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function getcashier()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getproduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
