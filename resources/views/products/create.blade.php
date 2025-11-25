@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">

    <a href="{{ route('products.index') }}"
        class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded inline-block mb-4">
        ← Back to Products
    </a>

    <h1 class="text-2xl font-bold mb-6">Add Product</h1>

    <form action="{{ route('products.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label class="block font-medium">Name</label>
            <input type="text" name="name" class="w-full border-gray-300 rounded" required>
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">SKU (optional)</label>
            <input type="text" name="sku" class="w-full border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border-gray-300 rounded"></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Purchase Price</label>
                <input type="number" name="purchase_price" step="0.01" class="w-full border-gray-300 rounded">
            </div>
            <div>
                <label class="block font-medium">Selling Price</label>
                <input type="number" name="selling_price" step="0.01" class="w-full border-gray-300 rounded">
            </div>
        </div>

        <button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Save Product
        </button>
    </form>

</div>
@endsection