@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">

    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
        <a href="{{ route('products.index') }}"
            class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded">
            ← Back to Products
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 px-3 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white shadow rounded p-6">
        <p><strong>SKU:</strong> {{ $product->sku ?? '—' }}</p>
        <p><strong>Description:</strong> {{ $product->description ?? 'N/A' }}</p>
        <p><strong>Purchase Price:</strong> {{ $product->purchase_price }}</p>
        <p><strong>Selling Price:</strong> {{ $product->selling_price }}</p>
        <p class="mt-2 text-lg">
            <strong>Current Stock:</strong>
            <span class="font-bold {{ $product->quantity <= 5 ? 'text-red-600' : 'text-green-600' }}">
                {{ $product->quantity }}
            </span>
        </p>
        <p class="text-sm text-gray-500">
            Created by: {{ $product->creator->name ?? 'Unknown' }} <br>
            Last updated by: {{ $product->updater->name ?? 'Unknown' }}
        </p>


        <div class="flex space-x-3 mt-4">
            <a href="{{ route('products.edit', $product->id) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow">
                Edit Product
            </a>
            <a href="{{ route('stock.create', $product->id) }}"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                Adjust Stock
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                onsubmit="return confirm('Delete this product?');">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow">
                    Delete
                </button>
            </form>
        </div>
    </div>

</div>
@endsection