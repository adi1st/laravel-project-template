{{-- 
    Dashboard Quick Actions Component
    Usage: @include('components.dashboard.quick-actions', [
        'actions' => [
            [
                'title' => 'Add User',
                'description' => 'Create a new user account',
                'icon' => 'user-plus',
                'color' => 'blue',
                'href' => route('users.create')
            ],
            // ... more actions
        ]
    ])
--}}

<div class="bg-white shadow-sm rounded-lg border border-gray-200">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Quick Actions</h3>
    </div>
    
    <div class="p-6">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($actions as $action)
            <a href="{{ $action['href'] ?? '#' }}" 
               class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-500 rounded-lg border border-gray-200 hover:border-{{ $action['color'] ?? 'blue' }}-300 hover:shadow-md transition-all duration-200">
                <div>
                    <span class="rounded-lg inline-flex p-3 bg-{{ $action['color'] ?? 'blue' }}-50 text-{{ $action['color'] ?? 'blue' }}-600 ring-4 ring-white">
                        @switch($action['icon'] ?? 'plus')
                            @case('user-plus')
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                @break
                            @case('document-plus')
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                @break
                            @case('cog')
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                @break
                            @default
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                        @endswitch
                    </span>
                </div>
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900">
                        <span class="absolute inset-0"></span>
                        {{ $action['title'] }}
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        {{ $action['description'] }}
                    </p>
                </div>
                <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400 transition-colors duration-200">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"></path>
                    </svg>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</div>