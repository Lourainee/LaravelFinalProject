@extends('layouts.app')

@section('title', 'Forgot Password - TaskFlow')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-white rounded-lg shadow-xl p-8">
        <h2 class="text-3xl font-bold text-blue-600 mb-2">Forgot Password</h2>
        <p class="text-gray-600 mb-6">Enter your email to receive a password reset link</p>

        @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input id="email" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required autofocus />
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full mt-6 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                Send Reset Link
            </button>
        </form>

        <p class="text-center text-gray-600 mt-6">
            <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Back to login</a>
        </p>
    </div>
</div>
@endsection
