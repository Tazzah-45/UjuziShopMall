@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">

    <a href="{{ route('products.index') }}"
        class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded inline-block mb-4">
        ← Back to Products
    </a>

    <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">SKU</label>
            <input type="text" name="sku" value="{{ $product->sku }}" class="w-full border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border-gray-300 rounded">{{ $product->description }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Purchase Price</label>
                <input type="number" name="purchase_price" step="0.01" value="{{ $product->purchase_price }}" class="w-full border-gray-300 rounded">
            </div>
            <div>
                <label class="block font-medium">Selling Price</label>
                <input type="number" name="selling_price" step="0.01" value="{{ $product->selling_price }}" class="w-full border-gray-300 rounded">
            </div>
        </div>

        <button class="mt-6 bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">
            Update Product
        </button>
    </form>

</div>
@endsection