<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'customer_placeofwork',
        'guarantor_name',
        'guarantor_phone',
        'guarantor_address',
        'guarantor_placeofwork',
    ];
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
