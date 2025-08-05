@props(['type' => 'info', 'message' => null])

@php
    $colors = [
        'success' => [
            'bg' => 'bg-green-100 dark:bg-green-800',
            'text' => 'text-green-700 dark:text-green-200',
            'iconBg' => 'bg-green-200 dark:bg-green-700',
            'iconText' => 'text-green-500 dark:text-green-300',
            'ring' => 'focus:ring-green-400',
            'hover' => 'hover:bg-green-200 dark:hover:bg-green-700',
            'border' => 'border-green-400'
        ],
        'error' => [
            'bg' => 'bg-red-100 dark:bg-red-800',
            'text' => 'text-red-700 dark:text-red-200',
            'iconBg' => 'bg-red-200 dark:bg-red-700',
            'iconText' => 'text-red-500 dark:text-red-300',
            'ring' => 'focus:ring-red-400',
            'hover' => 'hover:bg-red-200 dark:hover:bg-red-700',
            'border' => 'border-red-400'
        ],
        'info' => [
            'bg' => 'bg-blue-100 dark:bg-blue-800',
            'text' => 'text-blue-700 dark:text-blue-200',
            'iconBg' => 'bg-blue-200 dark:bg-blue-700',
            'iconText' => 'text-blue-500 dark:text-blue-300',
            'ring' => 'focus:ring-blue-400',
            'hover' => 'hover:bg-blue-200 dark:hover:bg-blue-700',
            'border' => 'border-blue-400'
        ],
        'warning' => [
            'bg' => 'bg-yellow-100 dark:bg-yellow-800',
            'text' => 'text-yellow-700 dark:text-yellow-200',
            'iconBg' => 'bg-yellow-200 dark:bg-yellow-700',
            'iconText' => 'text-yellow-500 dark:text-yellow-300',
            'ring' => 'focus:ring-yellow-400',
            'hover' => 'hover:bg-yellow-200 dark:hover:bg-yellow-700',
            'border' => 'border-yellow-400'
        ],
    ];

    $styles = $colors[$type] ?? $colors['info'];
@endphp

@if($message)
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 4000)"
        x-cloak
        class="fixed top-24 right-5 z-50 flex items-center w-full max-w-sm p-4 rounded-lg shadow-lg border {{ $styles['bg'] }} {{ $styles['text'] }} {{ $styles['border'] }}"
        role="alert"
    >
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg {{ $styles['iconBg'] }} {{ $styles['iconText'] }}">
            @if($type === 'success')
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
            @elseif($type === 'error')
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
            @elseif($type === 'info')
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
            @elseif($type === 'warning')
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.3 2.67-1.3 3.432 0L19.4 13.911c.762 1.3-1.151 2.9-2.694 2.9H3.293c-1.543 0-3.456-1.6-2.694-2.9L8.257 3.099zM10 11a1 1 0 100-2 1 1 0 000 2zm-1 4a1 1 0 102 0 1 1 0 00-2 0z" clip-rule="evenodd"/></svg>
            @endif
        </div>
        <div class="ml-3 text-sm font-medium" x-text="`{{ $message }}`"></div>
        <button
            type="button"
            @click="show = false"
            class="ml-auto -mx-1.5 -my-1.5 rounded-lg p-1.5 {{ $styles['hover'] }} {{ $styles['text'] }} {{ $styles['ring'] }}"
            aria-label="Close"
        >
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
        </button>
    </div>
@endif
