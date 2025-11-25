@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">

    <a href="{{ route('products.show', $product->id) }}"
        class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded inline-block mb-4">
        ← Back to Product
    </a>

    <h1 class="text-xl font-bold mb-6">Adjust Stock: {{ $product->name }}</h1>

    <form action="{{ route('stock.store', $product->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label class="font-medium">Type</label>
            <select name="type" class="w-full border-gray-300 rounded">
                <option value="in">Stock In</option>
                <option value="out">Stock Out</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="font-medium">Quantity</label>
            <input type="number" name="quantity" class="w-full border-gray-300 rounded">
            @error('quantity')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="font-medium">Notes (optional)</label>
            <textarea name="notes" class="w-full border-gray-300 rounded"></textarea>
        </div>

        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Update Stock
        </button>

    </form>
</div>
@endsection