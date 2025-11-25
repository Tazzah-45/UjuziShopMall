@extends('layouts.app')

@section('content')
<div class="relative bg-gray-100 min-h-screen flex flex-col">

    {{-- Hero Section --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-20 px-6 text-center">
            <h1 class="text-5xl font-bold text-gray-800 mb-6">
                Welcome to Ujuzi Shop Mall
            </h1>
            <p class="text-gray-600 text-lg mb-8">
                Manage your products and stock effortlessly. Digitize your store and stay on top of inventory.
            </p>
            @auth
            <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow">
                Go to Dashboard
            </a>
            @endauth
            @guest
            <a href="{{ route('login') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold shadow">
                Login to Start
            </a>
            @endguest
        </div>
    </div>

    {{-- Features Section --}}
    <div class="max-w-7xl mx-auto py-20 px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-blue-600 mb-4">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h2v7H3v-7zm16 0h2v7h-2v-7zM7 10h2v7H7v-7zm8 0h2v7h-2v-7z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-2">Product Management</h3>
            <p class="text-gray-600">Easily add, edit, and remove products from your store.</p>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-green-600 mb-4">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-2">Stock Tracking</h3>
            <p class="text-gray-600">Monitor stock levels in real-time and get low-stock alerts.</p>
        </div>
        <div class="bg-white rounded shadow p-6 text-center">
            <div class="text-yellow-500 mb-4">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-2">Reports & Analytics</h3>
            <p class="text-gray-600">View detailed product statistics and stock movement charts.</p>
        </div>
    </div>

    {{-- Call to Action --}}
    <div class="bg-blue-50 py-16 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to Manage Your Store?</h2>
        @auth
        <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow">
            Go to Dashboard
        </a>
        @endauth
        @guest
        <a href="{{ route('login') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold shadow">
            Login to Start
        </a>
        @endguest
    </div>
</div>
@endsection