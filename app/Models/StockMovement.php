<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class StockMovement extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'product_id',
        'type',        // 'in' or 'out'
        'quantity',
        'notes',
    ];

    /**
     * Automatically set the user who performed the stock movement
     */
    protected static function booted()
    {
        static::creating(function ($movement) {
            if (Auth::check()) {
                $movement->performed_by = Auth::id();
            }
        });
    }

    /**
     * The product associated with this stock movement
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * The user who performed this stock movement
     */
    public function performer()
    {
        return $this->belongsTo(User::class, 'performed_by');
    }
}
