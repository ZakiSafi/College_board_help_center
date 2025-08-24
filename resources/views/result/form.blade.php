<x-layout>
    <!-- Hero Section with Form -->
    <section class="bg-[#1f4d92] p-8 min-h-[60vh] flex items-center justify-center">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
            <!-- Left Column: Text Content -->
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl font-bold text-white mb-4">Find Your Exam Results</h1>
                <p class="text-lg text-gray-200 mb-6">
                    Enter your details below to retrieve your exam results securely.
                </p>
                <div class="hidden md:block">
                    <div class="flex items-center gap-2 text-gray-200 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Secure and confidential</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Instant results retrieval</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Card -->
            <div class="md:w-1/2 bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
                <h2 class="text-2xl font-bold text-[#002d72] mb-6 text-center">Enter Your Details</h2>
                
                <form method="POST" action="{{ route('result.search') }}" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72]"
                            placeholder="Enter your name"
                            required
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Passport Number Field -->
                    <div>
                        <label for="passport_number" class="block text-gray-700 font-medium mb-2">Passport Number</label>
                        <input 
                            type="text" 
                            id="passport_number" 
                            name="passport_number" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72]"
                            placeholder="enter passport or ID number"
                            required
                        >
                        @error('passport_number')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date of Birth Field -->
                    <div>
                        <label for="date_of_birth" class="block text-gray-700 font-medium mb-2">Date of Birth</label>
                        <input 
                            type="date" 
                            id="date_of_birth" 
                            name="date_of_birth" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72]"
                            required
                        >
                        @error('date_of_birth')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Exam Date Field -->
                    <div>
                        <label for="exam_date" class="block text-gray-700 font-medium mb-2">Exam Date</label>
                        <input 
                            type="date" 
                            id="exam_date" 
                            name="exam_date" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72]"
                            required
                        >
                        @error('exam_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-[#002d72] hover:bg-[#1f4d92] text-white font-semibold py-3 px-4 rounded-md transition-all"
                    >
                        Retrieve Results
                    </button>
                </form>

                <div class="mt-6 text-center text-sm text-gray-500">
                    <p>Having trouble? <a href="#" class="text-[#002d72] hover:underline">Contact support</a></p>
                </div>
            </div>
        </div>
    </section>
</x-layout>