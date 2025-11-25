@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">

    {{-- Error Messages --}}
    @if ($errors->any())
    <div class="w-full max-w-md mb-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    {{-- Auth Card --}}
    <div class="w-full max-w-md bg-white shadow rounded p-6">

        <h2 class="text-2xl font-bold text-center mb-6">Login to Ujuzi Shop Mall</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full border rounded px-3 py-2 mt-1
                    @error('email') border-red-500 @enderror">
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full border rounded px-3 py-2 mt-1
                    @error('email') border-red-500 @enderror">
            </div>

            {{-- Submit --}}
            <div class="mb-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Login
                </button>
            </div>
        </form>

        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('register') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-semibold shadow">
                Register
            </a>

            <a href="{{ route('welcome') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded font-semibold shadow">
                &larr; Back to Home
            </a>
        </div>

    </div>
</div>
@endsection