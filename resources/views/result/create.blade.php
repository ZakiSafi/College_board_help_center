<x-layout>
    <!-- Hero Section with Form -->
    <section class="bg-[#1f4d92] p-8 min-h-[60vh] flex items-center justify-center">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
            <!-- Left Column: Text Content -->
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl font-bold text-white mb-4">Create Student Data</h1>
                <p class="text-lg text-gray-200 mb-6">
                    Register student data to access it any time any where.
                </p>
                <div class="hidden md:block space-y-4">
                    <div class="flex items-center gap-2 text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Secure and confidential creation</span>
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
                <h2 class="text-2xl font-bold text-[#002d72] mb-6 text-center">Student Data Creation</h2>

                <form method="POST" action="{{ route('result.store') }}" class="space-y-5" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="student_id" class="block text-gray-700 font-medium mb-2">Student Name</label>
                        
                                            <select
                        name="student_id"
                        id="student_id"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72] focus:border-transparent"
                    >
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>

                        @error('student_id')
                        <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
                        @enderror
                       
                    </div>

                    <!-- paper pdf -->
                    <div>
                        <label for="paper" class="block text-gray-700 font-medium mb-2">Exam Result Pdf</label>
                        <input 
                            type="file"
                            id="paper"
                            name="paper"
                            required />
                            <br>
                        <span class="text-gray-400 text-xs sm:text-sm">PDF only (max 4MB)</span>

                           
                        @error('paper')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label for="exam_date" class="block text-gray-700 font-medium mb-2">Exam Date</label>
                        <input 
                            id="exam_date" 
                            type="date" 
                            name="exam_date" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#002d72] focus:border-transparent"
                        >
                        @error('exam_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    
                    <div class="flex items-center justify-between mt-6">
                        <button type="submit" class="bg-[#002d72] hover:bg-[#1f4d92] text-white font-semibold px-6 py-3 rounded-md transition-all">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>