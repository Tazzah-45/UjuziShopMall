<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // -------------------------
        // Summary Stats
        // -------------------------
        $totalProducts = Product::count();
        $totalQuantity = Product::sum('quantity');
        $lowStockCount = Product::where('quantity', '<', 10)->count();
        $totalMovements = StockMovement::count();

        // -------------------------
        // Chart: Stock Per Product
        // -------------------------
        $chartLabels = Product::pluck('name');   // Product names
        $chartData = Product::pluck('quantity'); // Stock quantities

        // -------------------------
        // Chart: Movements Over Time
        // -------------------------
        // Group by date
        $movementsByDate = StockMovement::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $movementDates = $movementsByDate->pluck('date');
        $movementValues = $movementsByDate->pluck('count');

        // -------------------------
        // Recent Movements
        // -------------------------
        $recentMovements = StockMovement::with(['product', 'performer'])
            ->latest()
            ->take(5)
            ->get();

        // -------------------------
        // Top Users by Stock Changes
        // -------------------------
        $topUsers = StockMovement::select('performed_by')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('performed_by')
            ->orderByDesc('total')
            ->with('performer')
            ->get()
            ->map(function ($movement) {
                return [
                    'name' => $movement->performer->name ?? 'Unknown',
                    'total' => $movement->total,
                ];
            });

        // -------------------------
        // Return to dashboard view
        // -------------------------
        return view('dashboard.index', compact(
            'totalProducts',
            'totalQuantity',
            'lowStockCount',
            'totalMovements',
            'chartLabels',
            'chartData',
            'movementDates',
            'movementValues',
            'recentMovements',
            'topUsers'
        ));
    }
}
