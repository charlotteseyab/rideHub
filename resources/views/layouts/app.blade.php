<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'RideHub'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Figtree', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <!-- Smooth Scroll Behavior -->
    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 4rem;
        }
    </style>

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        window.axios = axios;
        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">
    @if(request()->is('/'))
        <!-- Navbar for Welcome Page -->
        <nav class="bg-white dark:bg-gray-800 shadow-sm fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-xl font-bold text-gray-900 dark:text-white">RideHub</a>
                    </div>

                    <!-- Desktop Navigation Links -->
                    <div class="hidden md:flex items-center space-x-8">
                        {{-- <a href="#home" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Home</a> --}}
                        {{-- <a href="#brands" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Car Brands</a> --}}
                        <a href="#featured-cars" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Featured Cars</a>
                        <a href="#categories" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Category</a>
                        <a href="#why-choose-us" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Why Choose Us</a>
                        <a href="#contact" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Contact</a>
                        
                        @auth
                            <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Login</a>
                            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Register</a>
                        @endauth
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden flex items-center">
                        <button type="button" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white" onclick="toggleMobileMenu()">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="hidden md:hidden bg-white dark:bg-gray-800 shadow-lg" id="mobileMenu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="#home" class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Home</a>
                    <a href="#brands" class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Car Brands</a>
                    <a href="#featured-cars" class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Featured Cars</a>
                    <a href="#services" class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Services</a>
                    <a href="#about" class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">About</a>
                    <a href="#contact" class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Contact</a>
                    
                    @auth
                        <a href="{{ route('dashboard') }}" class="block px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Login</a>
                        <a href="{{ route('register') }}" class="block px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Register</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Main Content with padding for fixed navbar -->
        <main class="pt-16">
            @yield('content')
        </main>

        <!-- Footer for Welcome Page -->
        <footer class="bg-white dark:bg-gray-800 shadow-sm mt-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">About RideHub</h3>
                        <p class="text-gray-600 dark:text-gray-300">Your premier destination for luxury and reliable vehicles. We offer a wide selection of cars from top manufacturers.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">About Us</a></li>
                            <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Contact</a></li>
                            <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Terms of Service</a></li>
                            <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Connect With Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="border-t dark:border-gray-700 mt-8 pt-8 text-center">
                    <p class="text-gray-600 dark:text-gray-300">&copy; {{ date('Y') }} RideHub. All rights reserved.</p>
                </div>
            </div>
        </footer>
    @else
        @auth
            <!-- Sidebar for authenticated users -->
            <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-gray-800 shadow-lg transform transition-transform duration-300 lg:translate-x-0" 
                 id="sidebar">
                <div class="flex flex-col h-full">
                    <!-- Logo -->
                    <div class="flex items-center p-4 border-b dark:border-gray-700">
                        <span class="text-xl font-bold text-gray-900 dark:text-white">RideHub</span>
                    </div>

                    <!-- Navigation -->
                    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                        <a href="{{ route('dashboard') }}" 
                           class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300' : '' }}">
                            <i class="fas fa-tachometer-alt w-5 h-5"></i>
                            <span class="ml-3">Dashboard</span>
                        </a>

                        <!-- Cars Dropdown -->
                        <div class="space-y-2">
                            <button onclick="toggleCarsMenu()" 
                                    class="flex items-center justify-between w-full px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                                <div class="flex items-center">
                                    <i class="fas fa-car w-5 h-5"></i>
                                    <span class="ml-3">Cars</span>
                                </div>
                                <i class="fas fa-chevron-down transition-transform duration-200" id="carsArrow"></i>
                            </button>
                            
                            <!-- Cars Submenu -->
                            <div class="hidden pl-10 space-y-2" id="carsSubmenu">
                                <a href="{{ route('cars.benz') }}" 
                                   class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('cars.benz') ? 'bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300' : '' }}">
                                    <span>Benz</span>
                                </a>
                                <a href="{{ route('cars.kia') }}" 
                                   class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('cars.kia') ? 'bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300' : '' }}">
                                    <span>Kia</span>
                                </a>
                                <a href="{{ route('cars.honda') }}" 
                                   class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('cars.honda') ? 'bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300' : '' }}">
                                    <span>Honda</span>
                                </a>
                            </div>
                        </div>
                    </nav>

                    <!-- User Profile -->
                    <div class="p-4 border-t dark:border-gray-700">
                        <div class="flex items-center space-x-3">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                    {{ Auth::user()->name }}
                                </p>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-600 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Overlay -->
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 lg:hidden hidden" id="sidebarOverlay" onclick="toggleSidebar()"></div>

            <!-- Main Content Area -->
            <div class="lg:pl-64">
                <!-- Header -->
                {{-- <header class="bg-white dark:bg-gray-800 shadow-sm">
                    <div class="flex items-center justify-between px-4 py-4 lg:px-8">
                        <button class="lg:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" onclick="toggleSidebar()">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-900 dark:text-white">@yield('header', 'Dashboard')</h1>
                        <div></div>
                    </div>
                </header> --}}

                <!-- Page Content -->
                <main class="py-6">
                    @yield('content')
                </main>
            </div>
        @else
            <!-- Content for non-authenticated users -->
            <main>
                @yield('content')
            </main>
        @endauth
    @endif

    <!-- Sidebar JavaScript -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function toggleCarsMenu() {
            const submenu = document.getElementById('carsSubmenu');
            const arrow = document.getElementById('carsArrow');
            
            submenu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        }

        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }

        // Initialize sidebar state on mobile
        if (window.innerWidth < 1024) {
            document.getElementById('sidebar')?.classList.add('-translate-x-full');
        }
    </script>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html> 