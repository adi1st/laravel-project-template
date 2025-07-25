{{-- 
    Dashboard Card Component
    Usage: @include('components.dashboard.card', [
        'title' => 'Card Title',
        'value' => '1,234',
        'subtitle' => 'Optional subtitle',
        'icon' => 'users', // optional
        'trend' => '+12%', // optional
        'trend_positive' => true, // optional
        'color' => 'blue' // blue, green, red, yellow, purple, gray
    ])
--}}

@php
$colors = [
    'blue' => 'bg-blue-50 text-blue-600',
    'green' => 'bg-green-50 text-green-600',
    'red' => 'bg-red-50 text-red-600',
    'yellow' => 'bg-yellow-50 text-yellow-600',
    'purple' => 'bg-purple-50 text-purple-600',
    'gray' => 'bg-gray-50 text-gray-600'
];

$iconColor = $colors[$color ?? 'blue'];
@endphp

<div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200 hover:shadow-md transition-shadow duration-200">
    <div class="p-6">
        <div class="flex items-center">
            @if(isset($icon))
            <div class="flex-shrink-0">
                <div class="w-8 h-8 {{ $iconColor }} rounded-md flex items-center justify-center">
                    @switch($icon)
                        @case('users')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                            </svg>
                            @break
                        @case('dollar')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            @break
                        @case('chart')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            @break
                        @case('shopping-cart')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                            </svg>
                            @break
                        @default
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                    @endswitch
                </div>
            </div>
            @endif
            
            <div class="{{ isset($icon) ? 'ml-5' : '' }} w-0 flex-1">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">{{ $title }}</dt>
                    <dd class="flex items-baseline">
                        <div class="text-2xl font-semibold text-gray-900">{{ $value }}</div>
                        @if(isset($trend))
                        <div class="ml-2 flex items-baseline text-sm font-semibold {{ isset($trend_positive) && $trend_positive ? 'text-green-600' : 'text-red-600' }}">
                            @if(isset($trend_positive) && $trend_positive)
                                <svg class="self-center flex-shrink-0 h-4 w-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            @else
                                <svg class="self-center flex-shrink-0 h-4 w-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            @endif
                            <span class="sr-only">{{ isset($trend_positive) && $trend_positive ? 'Increased' : 'Decreased' }} by</span>
                            {{ $trend }}
                        </div>
                        @endif
                    </dd>
                    @if(isset($subtitle))
                    <dd class="text-sm text-gray-600 mt-1">{{ $subtitle }}</dd>
                    @endif
                </dl>
            </div>
        </div>
    </div>
</div>