<x-layout>
    <!-- Result Display Section -->
    <section class="bg-gradient-to-b from-gray-100 to-white py-12 min-h-screen">
        <div class="container mx-auto px-4">
            <!-- Main Card -->
            <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden">
                <!-- Header with Branding -->
                <div class="bg-gradient-to-r from-[#1f4d92] to-[#003366] p-6 text-white">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold">Examination Result</h1>
                            <p class="text-blue-100 mt-1">Official Academic Record</p>
                        </div>
                        <div class="mt-4 md:mt-0 flex items-center space-x-3">
                            <span class="bg-white/20 px-3 py-1 rounded-full text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                                </svg>
                                Valid Certificate
                            </span>
                        </div>
                    </div>
                </div>

                <!-- PDF Viewer Section -->
                <div class="p-6 md:p-8">
                    <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                        <!-- PDF Viewer -->
                        <div class="relative" style="padding-top: 141.42%;"> <!-- Aspect ratio for A4 -->
                            @if($result->paper)
                                <embed 
                                    src="{{ Storage::url($result->paper) }}#toolbar=0&navpanes=0"
                                    type="application/pdf"
                                    class="absolute top-0 left-0 w-full h-full"
                                    style="border: none;"
                                >
                            @else
                                <div class="absolute inset-0 flex flex-col items-center justify-center bg-gray-100 text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-lg font-medium">Result document not available</p>
                                    <p class="text-sm mt-2">Please contact administration</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Information & Actions -->
                <div class="px-6 md:px-8 pb-6 md:pb-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Student Info -->
                        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                Student Information
                            </h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-600">Name</p>
                                    <p class="font-medium">{{ $result->student->name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Passport Number</p>
                                    <p class="font-medium">{{ $result->student->passport_number }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Date of Birth</p>
                                    <p class="font-medium">{{ \Carbon\Carbon::parse($result->student->date_of_birth)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Exam Info & Actions -->
                        <div class="space-y-6">
                            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    Examination Details
                                </h3>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm text-gray-600">Exam Date</p>
                                        <p class="font-medium">{{ $result->exam_date ? \Carbon\Carbon::parse($result->exam_date)->format('d M Y') : 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Document ID</p>
                                        <p class="font-mono text-sm bg-gray-100 px-2 py-1 rounded inline-block">{{ $result->id }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-2 gap-4">
                                <a href="{{ route('result.form') }}" 
                                   class="flex items-center justify-center px-4 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                    </svg>
                                    Back
                                </a>
                                @if($result->paper)
                                <a href="{{ route('result.download', $result->id) }}" 
                                    class="flex items-center justify-center px-4 py-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-lg hover:from-blue-700 hover:to-blue-900 transition shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download PDF
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Verification Footer -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm text-gray-600">
                            This document is valid and can be verified through our official portal using the Document ID above. 
                            For verification, visit <a href="#" class="text-blue-600 hover:underline">our verification page</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>