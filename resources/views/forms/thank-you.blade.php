@extends('forms.layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-2xl p-10">

        {{-- Header --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-emerald-700 mb-3">Form Submitted Successfully 🎉</h1>
            <p class="text-gray-600 text-lg">
                Thank you for completing the {{ ucfirst($formType) }} intake form.
            </p>
        </div>

        {{-- Fetch Submission --}}
        @php
            $submission = \App\Models\FormSubmission::where('user_id', auth()->id())
                ->where('form_type', $formType)
                ->where('status', 'completed')
                ->latest()
                ->first();
        @endphp

        @if(!$submission)
            <p class="text-red-600 text-center">Submission not found.</p>
        @else

        {{-- Total Score Card --}}
        <div class="bg-emerald-50 border-l-4 border-emerald-600 p-5 rounded-lg mb-8">
            <h2 class="text-2xl font-semibold text-emerald-700">Overall Score</h2>
            <p class="text-4xl font-bold mt-2">{{ $submission->total_score }}</p>
        </div>

        {{-- Section Score Breakdown --}}
        <div class="mb-10">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Section Breakdown</h3>
            <div class="space-y-3">
                @foreach($submission->section_scores ?? [] as $section => $score)
                    <div class="flex justify-between bg-gray-50 p-4 rounded-lg border">
                        <span class="font-medium text-gray-700">{{ ucfirst(str_replace('_',' ', $section)) }}</span>
                        <span class="font-bold text-gray-900">{{ $score }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- PDF Download --}}
        @if($submission->pdf_path)
            <a href="{{ asset('storage/'.$submission->pdf_path) }}" 
                class="block w-full text-center bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 rounded-lg transition duration-200 mb-6">
                Download Your PDF Report
            </a>
        @endif

        {{-- Basic Info --}}
        <div class="border-t pt-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Your Information</h3>
            <p><strong>Name:</strong> {{ $submission->user->name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $submission->user->email ?? 'N/A' }}</p>
            <p><strong>Submitted on:</strong> {{ $submission->created_at->format('F d, Y') }}</p>
        </div>

        @endif

    </div>
</div>
@endsection
