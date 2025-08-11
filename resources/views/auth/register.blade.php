<x-layout>
    <!-- Hero Section with Form -->
    <section class="bg-[#1f4d92] p-8 min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
            <!-- Left Column: Text Content -->
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl font-bold text-white mb-4">Create Your Student Account</h1>
                <p class="text-lg text-gray-200 mb-6">
                    Register to access your exam results and academic records. All fields are required for verification.
                </p>
                <div class="hidden md:block space-y-4">
                    <div class="flex items-center gap-2 text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Secure and confidential registration</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Your data is protected</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Registration Form Card -->
            <div class="md:w-1/2 bg-white rounded-lg shadow-xl p-8 max-w-md w-full">
                <h2 class="text-2xl font-bold text-[#002d72] mb-6 text-center">Student Registration</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input 
                            id="name" 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72] focus:border-transparent"
                            placeholder="John Doe"
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72] focus:border-transparent"
                            placeholder="john@example.com"
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Passport Number -->
                    <div>
                        <label for="passport_number" class="block text-gray-700 font-medium mb-2">Passport/ID Number</label>
                        <input 
                            id="passport_number" 
                            type="text" 
                            name="passport_number" 
                            value="{{ old('passport_number') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72] focus:border-transparent"
                            placeholder="AB1234567"
                        >
                        @error('passport_number')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label for="date_of_birth" class="block text-gray-700 font-medium mb-2">Date of Birth</label>
                        <input 
                            id="date_of_birth" 
                            type="date" 
                            name="date_of_birth" 
                            value="{{ old('date_of_birth') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72] focus:border-transparent"
                        >
                        @error('date_of_birth')
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
                            autocomplete="new-password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72] focus:border-transparent"
                            placeholder="••••••••"
                        >
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                        <input 
                            id="password_confirmation" 
                            type="password" 
                            name="password_confirmation" 
                            required
                            autocomplete="new-password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72] focus:border-transparent"
                            placeholder="••••••••"
                        >
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('login') }}" class="text-sm text-[#002d72] hover:underline font-medium">
                            Already registered?
                        </a>
                        <button type="submit" class="bg-[#002d72] hover:bg-[#1f4d92] text-white font-semibold px-6 py-3 rounded-md transition-all">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>