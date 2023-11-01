<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'plan_id',
        'item_name',
        'item_price',
        'down_payment',
        'balance',
        'profit',
        'total_due_amount',
        'per_month',
        'total_amount',
        'remaining_amount',
    ];

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }
    public function customers() {
    return $this->belongsTo(Customer::class, 'customer_id', 'id');
}
}
