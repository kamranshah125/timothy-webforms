@php
    $title = $this->config['title'] ?? ucfirst($formType);
@endphp

<x-slot name="title">NeuroFit | {{ $title }}</x-slot>

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8 px-4">
    <div class="max-w-4xl mx-auto">

        {{-- Header with Title --}}
        <div class="flex items-center justify-center flex-col gap-3" >
            <img src="{{ asset('images/logo.png') }}" class="w-[150px] md:w-[180px]" alt="">
            <div class="text-center mb-8"  id="top">
                <h1 class="text-3xl font-bold text-gray-700 mb-2">
                    {{ $this->config['title'] ?? ucfirst($formType) }}
                </h1>
                <p class="text-gray-700 font-semibold">{{ $pageConfig['title'] ?? 'Complete the form below' }}</p>
            </div>
        </div>

        {{-- Modern Step Indicator --}}
        <div class="bg-white rounded-xl shadow-md p-6 mb-6" >
            <div class="flex items-center justify-between relative">
                <div class="absolute top-5 left-0 right-0 h-1 bg-gray-200 -z-10">
                    <div class="h-full bg-blue-600 transition-all duration-500"
                        style="width: {{ (($step - 1) / max($totalSteps - 1, 1)) * 100 }}%"></div>
                </div>

                @for ($i = 1; $i <= $totalSteps; $i++)
                    <div class="flex flex-col items-center flex-1">
                        <button wire:click="goTo({{ $i }})"
                            class="w-10 h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-all duration-300 relative z-10
                                {{ $i < $step ? 'bg-blue-600 text-white' : ($i == $step ? 'bg-blue-600 text-white ring-4 ring-blue-200 scale-110' : 'bg-white text-gray-400 border-2 border-gray-300') }}">
                            @if ($i < $step)
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            @else
                                {{ $i }}
                            @endif
                        </button>
                        <span class="text-xs mt-2 font-medium {{ $i == $step ? 'text-blue-600' : 'text-gray-500' }}">
                            Section {{ $i }}
                        </span>
                    </div>
                @endfor
            </div>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-xl shadow-lg p-8">
            <form wire:submit.prevent="next">
                <div class="space-y-6">
                    @if ($pageConfig && !empty($pageConfig['sections']))
                        @foreach ($pageConfig['sections'] as $section)
                            <h2
                                class="text-lg font-bold text-sky-600 uppercase border-b pb-2 mb-4 mt-8 text-center border-blue-400">
                                {{ $section['title'] ?? '' }}
                            </h2>


                            <div class="grid grid-cols-12 gap-y-6 gap-x-4">
                                @foreach ($section['fields'] as $field)
                                    @php
                                        $name = $field['name'];
                                        $value = $data[$name] ?? null;
                                    @endphp

                                    <div
                                        class="{{ in_array($field['type'] ?? '', ['text', 'email', 'number', 'date']) ? 'col-span-12 md:col-span-6' : 'col-span-12' }}">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            {{ $field['label'] ?? ucfirst($name) }}
                                            @if (!empty($field['required']))
                                                <span class="text-red-500">*</span>
                                            @endif
                                        </label>

                                        @switch($field['type'] ?? 'text')
                                            {{-- TEXT (2 COLUMN) --}}
                                            @case('text')
                                                <input wire:model.defer="data.{{ $name }}" type="text"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    placeholder="Enter {{ strtolower($field['label'] ?? $name) }}" />
                                            @break

                                            {{-- EMAIL FULL WIDTH --}}
                                            @case('email')
                                                <input wire:model.defer="data.{{ $name }}" type="email"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    placeholder="your@email.com" />
                                            @break

                                            {{-- DATE FULL WIDTH --}}
                                            @case('date')
                                                <input wire:model.defer="data.{{ $name }}" type="date"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                                            @break

                                            {{-- NUMBER FULL WIDTH --}}
                                            @case('number')
                                                <input wire:model.defer="data.{{ $name }}" type="number"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                                            @break

                                            {{-- TEXTAREA FULL WIDTH (unchanged) --}}
                                            @case('textarea')
                                                <textarea wire:model.defer="data.{{ $name }}" rows="4"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    placeholder="Enter details..."></textarea>
                                            @break

                                            {{-- CHECKBOX FULL WIDTH --}}
                                            @case('checkbox-group')
                                                <div class="space-y-3 mt-3">
                                                    @foreach ($field['options'] as $optKey => $optLabel)
                                                        <label
                                                            class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition">
                                                            <input type="checkbox"
                                                                wire:model="data.{{ $name }}.{{ $optKey }}"
                                                                value="1"
                                                                class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-2" />
                                                            <span class="ml-3 text-gray-700">{{ $optLabel }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @break

                                            {{-- RADIO 2 COLUMN ALWAYS --}}
                                            @case('radio')
                                            @case('radio-score')
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                                                    @foreach ($field['options'] as $optKey => $optLabel)
                                                        <label
                                                            class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition">
                                                            <input type="radio" name="data_{{ $name }}"
                                                                wire:model="data.{{ $name }}"
                                                                value="{{ $optKey }}"
                                                                class="w-5 h-5 text-blue-600 border-gray-300 focus:ring-2" />
                                                            <span class="ml-3 text-gray-700">{{ $optLabel }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @break

                                            @default
                                                <input wire:model.defer="data.{{ $name }}" type="text"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg" />
                                        @endswitch

                                        @error("data.{$name}")
                                            <div class="text-sm text-red-600 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                    <div>
                        @if ($step > 1)
                            <button type="button" wire:click="prev"
                                class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Previous
                            </button>
                        @endif
                    </div>

                    <div class="flex space-x-3">
                        <button type="button" wire:click="saveProgress" wire:loading.attr="disabled"
                            class="px-6 py-3 bg-sky-300 text-gray-800 font-medium rounded-lg hover:bg-sky-500 transition-colors duration-200 flex items-center disabled:opacity-50 disabled:cursor-not-allowed">
                            <span wire:loading.remove wire:target="saveProgress">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                            </span>
                            <span wire:loading wire:target="saveProgress">
                                <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </span>
                            <span>Save Progress</span>
                        </button>

                        <button type="submit" wire:loading.attr="disabled"
                            class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center disabled:opacity-50 disabled:cursor-not-allowed">
                            <span wire:loading.remove wire:target="next">
                                {{ $step < $totalSteps ? 'Next' : 'Finish' }}
                            </span>
                            <span wire:loading wire:target="next">
                                <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </span>
                            <span wire:loading.remove wire:target="next">
                                @if ($step < $totalSteps)
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                @endif
                            </span>
                        </button>
                    </div>
                </div>
            </form>

            {{-- Success Toast --}}
            <div x-data="{ show: false }" x-on:notify.window="show = true; setTimeout(() => show = false, 3000)"
                x-show="show" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-2"
                class="fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center"
                style="display: none;">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-medium">Progress saved successfully!</span>
            </div>
        </div>
    </div>

<script>
    document.addEventListener('scrollToTop', () => {
        const el = document.getElementById('top');
        if (el) {
            el.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
</script>


</div>






















 