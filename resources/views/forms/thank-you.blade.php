@extends('forms.layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-10 px-4">
    <div class="max-w-4xl mx-auto">

        {{-- Success Header Card --}}
        <div class="bg-white rounded-xl shadow-lg p-8 mb-5 text-center">
            {{-- Success Icon --}}
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full mb-6 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>

            <h1 class="text-4xl font-bold text-gray-700 mb-3">
                Form Submitted Successfully!  
            </h1>
            <p class="text-lg text-gray-600">
                Thank you for completing the <strong>{{ ucfirst($submission->formType) }}</strong> intake form.
            </p>
        </div>

        {{-- Main Content Grid --}}
        <div class="grid md:grid-cols-2 gap-5 mb-5">
            
            {{-- Total Score Card --}}
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Overall Score</h2>
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50   p-6 rounded-lg text-center">
                    <p class="text-5xl font-bold text-blue-600 mb-2">{{ $submission->total_score }}</p>
                    <p class="text-sm text-gray-600 font-medium">Total Points</p>
                </div>
            </div>

            {{-- Submission Info Card --}}
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Submission Details</h2>
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Name</p>
                            <p class="text-gray-800 font-semibold">{{ $submission->user->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Email</p>
                            <p class="text-gray-800 font-semibold">{{ $submission->user->email ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Submitted On</p>
                            <p class="text-gray-800 font-semibold">{{ $submission->created_at->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Section Scores Breakdown --}}
        @if(!empty($submission->section_scores))
        <div class="bg-white rounded-xl shadow-lg p-6 mb-5">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Section Breakdown</h3>
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                </svg>
            </div>
            <div class="space-y-4">
                @foreach($submission->section_scores as $section => $score)
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                                <span class="font-semibold text-gray-700">
                                    {{ ucfirst(str_replace('_', ' ', $section)) }}
                                </span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg shadow-sm">
                                    {{ $score }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- PDF Download Button --}}
        @if($submission->pdf_path)
        <div class="bg-white rounded-xl shadow-lg p-6 mb-5">
            <div class="text-center">
                <svg class="w-16 h-16 text-blue-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Your Report is Ready</h3>
                <p class="text-gray-600 mb-6">Download your complete PDF report with all details</p>
                <a download="NeuroFit_Report.pdf" 
                   href="{{ asset($submission->pdf_path) }}" 
                   class="inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transition-all duration-200 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Download PDF Report
                </a>
            </div>
        </div>
        @endif

        {{-- Next Steps Card --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">What's Next?</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>You'll receive a confirmation email with your results</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Our team will review your submission within 24-48 hours</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Keep an eye out for next steps and recommendations</span>
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <p class="text-sm text-gray-600">
                            Questions? Contact us at 
                            <a href="mailto:info@neurofitconnections.com" class="text-blue-600 hover:text-blue-700 font-medium">
                                info@neurofitconnections.com
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection