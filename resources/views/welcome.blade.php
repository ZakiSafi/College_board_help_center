<x-layout>
    <!-- Hero Section (Two-Column Layout) -->
    <section class="bg-[#1f4d92] p-8 min-h-[60vh] border rounded-md flex items-center justify-center">
        <!-- Container for responsive layout -->
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
        <!-- Left Column: Text Content -->
        <div class="md:w-1/2 text-center md:text-left">
            <h1 class="text-4xl font-bold text-white mb-4">Forgot Your Credentials? Find Your Exam Results Here!</h1>
            <p class="text-lg text-gray-200 mb-6">
                Search using your details to quickly recover your exam scores and important academic information.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                <a 
                    href="{{ route('login') }}" 
                    class="bg-[white] hover:bg-[#fffbfb] text-[#080808] font-semibold px-6 py-3 rounded-md transition-all"
                >
                    Sign In
                </a>
                <a 
                    href="{{ route('register') }}" 
                    class="border-2 border-[#002d72]   bg-[#002d72] text-white font-semibold px-6 py-3 rounded-md transition-all"
                >
                    Register
                </a>
            </div>
        </div>
<!-- Right Column: Action Card -->
<div class="md:w-1/2 bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto text-center">
    <h2 class="text-2xl font-bold text-[#002d72] mb-4">Find Your Exam Results</h2>
    <p class="text-gray-600 mb-6">
        Enter your details on the next page to recover your exam scores quickly and securely.
    </p>
    <a
        href="{{route('result.form')}}" 
        class="inline-block bg-[#002d72] text-white  font-semibold px-8 py-4 rounded-md transition-all text-lg"
    >
        Search Exam Results
    </a>
</div>

    </div>
</section>

</x-layout>