<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'nama',
        'harga',
        'qty'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
