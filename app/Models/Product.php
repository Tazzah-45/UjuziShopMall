<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Product extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'description',
        'purchase_price',
        'selling_price',
        'quantity',
    ];

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    protected static function booted()
    {
        static::creating(function ($product) {
            if (Auth::check()) {
                $product->created_by = Auth::id();
                $product->updated_by = Auth::id();
            }
        });

        static::updating(function ($product) {
            if (Auth::check()) {
                $product->updated_by = Auth::id();
            }
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
