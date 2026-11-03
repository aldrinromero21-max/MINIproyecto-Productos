<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
protected $fillable = ['product_id', 'currency_id', 'price'];

// Relación opcional pero muy útil con Producto y Divisa
public function producto() {
    return $this->belongsTo(Producto::class, 'product_id');
}

public function currency() {
    return $this->belongsTo(Currency::class, 'currency_id');
}
}
