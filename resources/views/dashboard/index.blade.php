@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-gray-600">Total Products</h2>
            <p class="text-3xl font-bold mt-2">{{ $totalProducts }}</p>
        </div>
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-gray-600">Total Stock</h2>
            <p class="text-3xl font-bold mt-2">{{ $totalQuantity }}</p>
        </div>
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-gray-600">Low Stock Items</h2>
            <p class="text-3xl font-bold mt-2">{{ $lowStockCount }}</p>
        </div>
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-gray-600">Stock Movements</h2>
            <p class="text-3xl font-bold mt-2">{{ $totalMovements }}</p>
        </div>
    </div>

    {{-- Charts --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold mb-2">Stock Levels</h3>
            <canvas id="stockChart"></canvas>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold mb-2">Stock Movements Over Time</h3>
            <canvas id="movementChart"></canvas>
        </div>
    </div>

    {{-- Top Users by Stock Changes --}}
    <div class="bg-white rounded shadow p-6 mb-8">
        <h3 class="font-semibold mb-4">Top Users by Stock Changes</h3>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="p-3 text-left">User</th>
                    <th class="p-3 text-left">Total Changes</th>
                </tr>
            </thead>
            <tbody>
                @forelse($topUsers as $user)
                <tr class="border-b">
                    <td class="p-3">{{ $user['name'] }}</td>
                    <td class="p-3">{{ $user['total'] }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="p-3 text-center text-gray-500">
                        No activity yet
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Recent Activity --}}
    <div class="bg-white rounded shadow p-6">
        <h3 class="font-semibold mb-4">Recent Stock Movements</h3>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="p-3 text-left">Product</th>
                    <th class="p-3 text-left">Type</th>
                    <th class="p-3 text-left">Quantity</th>
                    <th class="p-3 text-left">Performed By</th>
                    <th class="p-3 text-left">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentMovements as $m)
                <tr class="border-b">
                    <td class="p-3">{{ $m->product->name }}</td>
                    <td class="p-3 capitalize">{{ $m->type }}</td>
                    <td class="p-3">{{ $m->quantity }}</td>
                    <td class="p-3">{{ $m->performer->name ?? 'Unknown' }}</td>
                    <td class="p-3">{{ $m->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-3 text-center text-gray-500">
                        No recent movements
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Stock Levels Chart
    const stockCtx = document.getElementById('stockChart');
    new Chart(stockCtx, {
        type: 'bar',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Quantity',
                data: @json($chartData),
                backgroundColor: 'rgba(37, 99, 235, 0.7)'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Stock Movements Over Time Chart
    const movementCtx = document.getElementById('movementChart');
    new Chart(movementCtx, {
        type: 'line',
        data: {
            labels: @json($movementDates),
            datasets: [{
                label: 'Movements',
                data: @json($movementValues),
                borderColor: 'rgba(16, 185, 129, 0.8)',
                backgroundColor: 'rgba(16, 185, 129, 0.3)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection