{{-- 
    Dashboard Widget Container
    Usage: @include('components.dashboard.widget', [
        'title' => 'Widget Title',
        'subtitle' => 'Optional subtitle',
        'actions' => true, // Show action buttons
        'collapsible' => true, // Make widget collapsible
        'class' => 'col-span-2' // Additional CSS classes
    ])
    
    Content goes in the slot
--}}

<div class="bg-white shadow-sm rounded-lg border border-gray-200 {{ $class ?? '' }}">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
                @if(isset($subtitle))
                <p class="mt-1 text-sm text-gray-500">{{ $subtitle }}</p>
                @endif
            </div>
            
            @if(isset($actions) && $actions || isset($collapsible) && $collapsible)
            <div class="flex items-center space-x-2">
                @if(isset($collapsible) && $collapsible)
                <button type="button" 
                        class="text-gray-400 hover:text-gray-600 transition-colors duration-200"
                        onclick="toggleWidget('{{ $title }}-widget')">
                    <svg class="h-5 w-5 transform transition-transform duration-200" id="{{ $title }}-widget-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                @endif
                
                @if(isset($actions) && $actions)
                <div class="relative">
                    <button type="button" 
                            class="text-gray-400 hover:text-gray-600 transition-colors duration-200"
                            onclick="toggleWidgetMenu('{{ $title }}-menu')">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                        </svg>
                    </button>
                    
                    <div id="{{ $title }}-menu" class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 hidden">
                        <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900 hover:bg-gray-50">Edit</a>
                        <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900 hover:bg-gray-50">Export</a>
                        <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900 hover:bg-gray-50">Remove</a>
                    </div>
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>

    <!-- Content -->
    <div id="{{ $title }}-widget-content" class="transition-all duration-300 ease-in-out">
        <div class="p-6">
            {{ $slot ?? 'Widget content goes here' }}
        </div>
    </div>
</div>

@if(isset($collapsible) && $collapsible || isset($actions) && $actions)
@push('scripts')
<script>
function toggleWidget(widgetId) {
    const content = document.getElementById(widgetId + '-content');
    const icon = document.getElementById(widgetId + '-icon');
    
    if (content.style.display === 'none') {
        content.style.display = 'block';
        icon.style.transform = 'rotate(0deg)';
    } else {
        content.style.display = 'none';
        icon.style.transform = 'rotate(-90deg)';
    }
}

function toggleWidgetMenu(menuId) {
    const menu = document.getElementById(menuId);
    menu.classList.toggle('hidden');
}

// Close menus when clicking outside
document.addEventListener('click', function(event) {
    const menus = document.querySelectorAll('[id$="-menu"]');
    menus.forEach(menu => {
        const button = event.target.closest('[onclick*="' + menu.id + '"]');
        if (!button && !menu.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
});
</script>
@endpush
@endif