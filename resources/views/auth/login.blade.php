@extends('layouts.app')

@section('title', 'Login - TaskFlow')

@section('content')
<div class="glass rounded-3xl shadow-2xl shadow-black/40 p-8 ring-1 ring-white/10">
        <h2 class="text-2xl font-semibold tracking-tight text-white mb-2">Sign in</h2>
        <p class="text-slate-400 mb-6">Pick up where you left off and keep your tasks moving forward.</p>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-slate-200 mb-2">Email</label>
                <input id="email" class="block mt-1 w-full px-4 py-3 bg-white/5 border border-white/10 rounded-2xl text-slate-100 placeholder:text-slate-500 focus:ring-2 focus:ring-sky-400 focus:border-transparent outline-none @error('email') ring-2 ring-rose-400 @enderror"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required autofocus autocomplete="username" />
                @error('email')
                    <span class="text-rose-300 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-slate-200 mb-2">Password</label>
                <input id="password" class="block mt-1 w-full px-4 py-3 bg-white/5 border border-white/10 rounded-2xl text-slate-100 placeholder:text-slate-500 focus:ring-2 focus:ring-sky-400 focus:border-transparent outline-none @error('password') ring-2 ring-rose-400 @enderror"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                @error('password')
                    <span class="text-rose-300 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2">
                    <input id="remember_me" type="checkbox" class="rounded border-white/20 bg-white/5 text-sky-400 shadow-sm focus:ring-sky-400" name="remember">
                    <span class="text-sm text-slate-300">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-slate-300 hover:text-white underline-offset-4 hover:underline">
                    Forgot password?
                </a>
            </div>

            <button type="submit" class="w-full mt-6 px-4 py-3 bg-gradient-to-r from-indigo-500 to-sky-400 text-slate-950 font-semibold rounded-2xl hover:opacity-95 transition shadow-lg shadow-indigo-500/20">
                Sign in
            </button>
        </form>

        <p class="text-center text-slate-400 mt-6">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-sky-300 font-medium hover:text-white underline-offset-4 hover:underline">Create one</a>
        </p>
</div>
@endsection
