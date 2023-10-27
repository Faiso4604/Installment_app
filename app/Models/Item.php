<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'item_name',
        'item_price',
        'down_payment',
        'balance',
        'profit',
        'total_due_amount',
        'per_month',
        'total_amount',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

