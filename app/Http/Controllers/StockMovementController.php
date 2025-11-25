<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockMovementController extends Controller
{
    /**
     * Show form to adjust stock (stock-in or stock-out)
     */
    public function create(Product $product)
    {
        return view('stock.adjust', compact('product'));
    }

    /**
     * Process stock-in or stock-out
     */
    public function store(Request $request, Product $product)
    {
        // Validate input
        $validated = $request->validate([
            'type'     => 'required|in:in,out',   // 'in' or 'out'
            'quantity' => 'required|integer|min:1',
            'notes'    => 'nullable|string|max:255',
        ]);

        // Ensure sufficient stock for stock-out
        if ($validated['type'] === 'out' && $validated['quantity'] > $product->quantity) {
            return back()->withErrors([
                'quantity' => 'Insufficient stock to perform stock-out.'
            ]);
        }

        // Update product quantity
        if ($validated['type'] === 'in') {
            $product->quantity += $validated['quantity'];
        } else {
            $product->quantity -= $validated['quantity'];
        }
        $product->save();

        // Record stock movement
        StockMovement::create([
            'product_id' => $product->id,
            'type'       => $validated['type'],
            'quantity'   => $validated['quantity'],
            'notes'      => $validated['notes'] ?? null,
            // performed_by is automatically filled in StockMovement model
        ]);

        return redirect()->route('products.show', $product->id)
            ->with('success', 'Stock updated successfully.');
    }

    /**
     * Optional: List all stock movements
     */
    public function index()
    {
        $stockMovements = StockMovement::with(['product', 'performer'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('stock.index', compact('stockMovements'));
    }
}
