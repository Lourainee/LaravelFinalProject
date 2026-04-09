@extends('layouts.app')

@section('title', 'Reset Password - TaskFlow')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-white rounded-lg shadow-xl p-8">
        <h2 class="text-3xl font-bold text-blue-600 mb-2">Reset Password</h2>
        <p class="text-gray-600 mb-6">Enter your new password below</p>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input id="email" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                        type="email"
                        name="email"
                        value="{{ old('email', $request->email) }}"
                        required autofocus autocomplete="username" />
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                <input id="password" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input id="password_confirmation" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        type="password"
                        name="password_confirmation"
                        required autocomplete="new-password" />
            </div>

            <button type="submit" class="w-full mt-6 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                Reset Password
            </button>
        </form>
    </div>
</div>
@endsection
