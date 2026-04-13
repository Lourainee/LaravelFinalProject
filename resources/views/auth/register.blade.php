@extends('layouts.app')

@section('title', 'Register - TaskFlow')

@section('content')
<div class="glass rounded-3xl shadow-2xl shadow-black/40 p-8 ring-1 ring-white/10">
        <h2 class="text-2xl font-semibold tracking-tight text-white mb-2">Create your account</h2>
        <p class="text-slate-400 mb-6">Organize your tasks, set priorities, and track progress.</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-slate-200 mb-2">Name</label>
                <input id="name" class="block mt-1 w-full px-4 py-3 bg-white/5 border border-white/10 rounded-2xl text-slate-100 placeholder:text-slate-500 focus:ring-2 focus:ring-sky-400 focus:border-transparent outline-none @error('name') ring-2 ring-rose-400 @enderror"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required autofocus autocomplete="name" />
                @error('name')
                    <span class="text-rose-300 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-slate-200 mb-2">Email</label>
                <input id="email" class="block mt-1 w-full px-4 py-3 bg-white/5 border border-white/10 rounded-2xl text-slate-100 placeholder:text-slate-500 focus:ring-2 focus:ring-sky-400 focus:border-transparent outline-none @error('email') ring-2 ring-rose-400 @enderror"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required autocomplete="username" />
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
                        required autocomplete="new-password" />
                @error('password')
                    <span class="text-rose-300 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-200 mb-2">Confirm password</label>
                <input id="password_confirmation" class="block mt-1 w-full px-4 py-3 bg-white/5 border border-white/10 rounded-2xl text-slate-100 placeholder:text-slate-500 focus:ring-2 focus:ring-sky-400 focus:border-transparent outline-none"
                        type="password"
                        name="password_confirmation"
                        required autocomplete="new-password" />
            </div>

            <button type="submit" class="w-full mt-6 px-4 py-3 bg-gradient-to-r from-indigo-500 to-sky-400 text-slate-950 font-semibold rounded-2xl hover:opacity-95 transition shadow-lg shadow-indigo-500/20">
                Sign up
            </button>
        </form>

        <p class="text-center text-slate-400 mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-sky-300 font-medium hover:text-white underline-offset-4 hover:underline">Sign in</a>
        </p>
</div>
@endsection
