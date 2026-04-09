<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TaskFlow')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    @auth
        <!-- Sidebar Navigation -->
        <div class="flex h-screen">
            <div class="w-64 bg-white shadow-lg flex flex-col">
                <div class="p-6 border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-blue-600">TaskFlow</h1>
                </div>
                
                <nav class="flex-1 p-4 space-y-2">
                    <a href="{{ route('dashboard') }}" 
                        class="block px-4 py-2 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-600' : 'hover:bg-gray-100 text-gray-700' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('tasks.index') }}" 
                        class="block px-4 py-2 rounded-lg transition {{ request()->routeIs('tasks.*') ? 'bg-blue-100 text-blue-600' : 'hover:bg-gray-100 text-gray-700' }}">
                        Tasks
                    </a>
                    <a href="{{ route('categories.index') }}" 
                        class="block px-4 py-2 rounded-lg transition {{ request()->routeIs('categories.*') ? 'bg-blue-100 text-blue-600' : 'hover:bg-gray-100 text-gray-700' }}">
                        Categories
                    </a>
                </nav>

                <div class="p-4 border-t border-gray-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Top Bar -->
                <div class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-600">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </div>

                <!-- Flash Messages -->
                <div class="px-6 pt-4">
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-green-800">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <ul class="list-disc list-inside text-red-800">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <!-- Page Content -->
                <div class="flex-1 overflow-auto px-6 pb-6">
                    @yield('content')
                </div>
            </div>
        </div>
    @else
        <!-- Guest Layout -->
        <div class="min-h-screen bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center p-4">
            @yield('content')
        </div>
    @endauth
</body>
</html>
