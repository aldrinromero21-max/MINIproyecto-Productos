<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'tax_cost', 'manufacturing_cost', 'currency_id'];

    public function prices()
    {
        return $this->hasMany(ProductPrice::class, 'product_id');
    }

    public function currency()
    {
        return $this->belongsTo(\App\Models\Currency::class, 'currency_id');
    }

    public function getPrecioCalculadoAttribute()
    {
        if ($this->currency && $this->currency->exchange_rate) {
            return $this->precio * $this->currency->exchange_rate;
        }

        return $this->precio;
    }
}
