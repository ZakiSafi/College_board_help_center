<x-layout>
    <!-- Hero Section with Password Reset Form -->
    <section class="bg-[#1f4d92] p-8 min-h-[60vh] flex items-center justify-center">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
            <!-- Left Column: Text Content -->
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl font-bold text-white mb-4">Reset Your Password</h1>
                <p class="text-lg text-gray-200 mb-6">
                    Forgot your password? No worries. We'll help you get back into your account quickly and securely.
                </p>
                <div class="hidden md:block space-y-4">
                    <div class="flex items-center gap-2 text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Secure password reset process</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        <span>Link expires automatically for security</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Password Reset Form Card -->
            <div class="md:w-1/2 bg-white rounded-lg shadow-xl p-8 max-w-md w-full">
                <h2 class="text-2xl font-bold text-[#002d72] mb-6 text-center">Password Recovery</h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-6 p-4 bg-blue-50 text-blue-800 rounded-md" :status="session('status')" />

                <div class="mb-6 text-gray-600">
                    {{ __('Enter your email address below and we\'ll send you a secure link to reset your password.') }}
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

                    <!-- Email Address -->
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
                            placeholder="your@email.com"
                        >
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('login') }}" class="text-sm text-[#002d72] hover:underline font-medium">
                            Remember your password?
                        </a>
                        <button type="submit" class="bg-[#002d72] hover:bg-[#1f4d92] text-white font-semibold px-6 py-3 rounded-md transition-all">
                            {{ __('Send Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>