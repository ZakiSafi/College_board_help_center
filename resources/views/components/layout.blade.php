<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>College Board Help Center</title>
    <!-- College Board uses Inter font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }

        main {
            flex-grow: 1; /* Makes main take all available space pushing footer down */
        }
       
        .cb-blue {
            background-color: #002d72;
        }
        .cb-orange {
            color: #ff6a00;
        }

        /* Animation for alerts */
        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes slideOut {
            from { transform: translateY(0); opacity: 1; }
            to { transform: translateY(-20px); opacity: 0; }
        }

        .alert {
            animation: slideIn 0.3s ease-out;
        }

        .alert.hide {
            animation: slideOut 0.3s ease-out;
        }
    </style>
</head>
<body>
    <!-- Header (College Board Style) -->
    <header class="cb-blue text-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <span class="ml-2 font-bold">
                    <i class="fas fa-question-circle mr-1"></i>
                    College Board Help Center
                </span>
            </div>
            <div>
                <nav class="space-x-4">
                    <a href="{{ route('welcome') }}" class="hover:underline">Home</a>
                    @auth
                        @if(auth()->user()->role == 'admin')
                            <a href="{{ route('result.create') }}" class="hover:underline">Create results</a>
                        @endif
                    @endauth
                    <a href="{{ route('result.form') }}" class="hover:underline">Check your result</a>
                </nav>
            </div>
            <!-- Login/Register -->
            <div class="flex space-x-4">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-white text-black px-4 py-1 rounded hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                @endauth
                @guest
                    <div class="flex space-x-4 items-center justify-center">
                        <a href="{{ route('login') }}" class="hover:underline">Sign In</a>
                        <a href="{{ route('register') }}" class="bg-white text-black px-4 py-1 rounded hover:bg-gray-100">Register</a>    
                    </div>
                @endguest
            </div>
        </div>
    </header>

    <!-- Flash Messages -->
    <div class="fixed top-4 right-4 z-50 w-full max-w-xs">
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-lg" role="alert">
                <div class="flex items-center">
                    <div class="py-1">
                        <svg class="h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Success</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8" onclick="this.parentElement.parentElement.classList.add('hide'); setTimeout(() => this.parentElement.parentElement.remove(), 300)">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
            <div class="alert bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow-lg" role="alert">
                <div class="flex items-center">
                    <div class="py-1">
                        <svg class="h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Error</p>
                        <ul class=" text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8" onclick="this.parentElement.parentElement.classList.add('hide'); setTimeout(() => this.parentElement.parentElement.remove(), 300)">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>

    <!-- Keep your existing $slot content -->
    <main class="container mx-auto py-8">
        {{ $slot }}
    </main>

    <!-- Footer (College Board Style) -->
    <footer class="cb-blue text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center space-x-6 mb-4">
                <a href="#" class="hover:underline">About Us</a>
                <a href="#" class="hover:underline">Careers</a>
                <a href="#" class="hover:underline">Contact</a>
            </div>
            <p class="text-sm">© 2024 College Board Help Center. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.add('hide');
                    setTimeout(() => alert.remove(), 300);
                }, 5000);
            });
        });
    </script>
</body>
</html>