@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">

    {{-- Header + Add Product Button --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Products</h1>
        <a href="{{ route('products.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Add Product
        </a>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    {{-- Table --}}
    <div class="bg-white shadow rounded">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">SKU</th>
                    <th class="p-3 text-left">Quantity</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $product->name }}</td>
                    <td class="p-3">{{ $product->sku }}</td>
                    <td class="p-3">{{ $product->quantity }}</td>
                    <td class="p-3 flex space-x-2">
                        <a href="{{ route('products.show', $product->id) }}"
                            class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded">
                            View
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                            Edit
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-3 text-center text-gray-500">
                        No products found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $products->links() }}
    </div>

</div>
@endsection