@extends('layouts.app')

@section('title', 'Login - TaskFlow')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-white rounded-lg shadow-xl p-8">
        <h2 class="text-3xl font-bold text-blue-600 mb-2">Welcome Back</h2>
        <p class="text-gray-600 mb-6">Login to your TaskFlow account</p>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input id="email" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required autofocus autocomplete="username" />
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input id="password" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
            </div>

            <button type="submit" class="w-full mt-6 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 mt-6">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:underline">Register here</a>
        </p>
    </div>
</div>
@endsection
