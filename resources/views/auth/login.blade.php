<x-layout>
    <!-- Hero Section with Login Form -->
    <section class="bg-[#1f4d92] p-8 min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
            <!-- Left Column: Text Content -->
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl font-bold text-white mb-4">Welcome Back</h1>
                <p class="text-lg text-gray-200 mb-6">
                    Sign in to access your exam results, academic records, and personalized dashboard.
                </p>
                <div class="hidden md:block space-y-4">
                    <div class="flex items-center gap-2 text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Secure access to your academic records</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Your data is always protected</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Login Form Card -->
            <div class="md:w-1/2 bg-white rounded-lg shadow-xl p-8 max-w-md w-full">
                <h2 class="text-2xl font-bold text-[#002d72] mb-6 text-center">Sign In</h2>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72] focus:border-transparent"
                            placeholder="john@example.com"
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required
                            autocomplete="current-password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72] focus:border-transparent"
                            placeholder="••••••••"
                        >
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me and Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                name="remember" 
                                class="rounded border-gray-300 text-[#002d72] focus:ring-[#002d72]"
                            >
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-[#002d72] hover:underline font-medium">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <div class="flex flex-col space-y-4 mt-6">
                        <button type="submit" class="bg-[#002d72] hover:bg-[#1f4d92] text-white font-semibold px-6 py-3 rounded-md transition-all">
                            Sign In
                        </button>

                        <div class="relative flex items-center py-4">
                            <div class="flex-grow border-t border-gray-300"></div>
                            <span class="flex-shrink mx-4 text-gray-500">or</span>
                            <div class="flex-grow border-t border-gray-300"></div>
                        </div>

                        <a href="{{ route('register') }}" class="border-2 border-[#002d72] text-[#002d72] hover:bg-[#002d72]/10 font-semibold px-6 py-3 rounded-md text-center transition-all">
                            Create New Account
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>