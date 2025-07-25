{{-- 
    Dashboard Table Component
    Usage: @include('components.dashboard.table', [
        'title' => 'Table Title',
        'headers' => ['Name', 'Email', 'Role', 'Status'],
        'data' => [
            ['John Doe', 'john@example.com', 'Admin', 'Active'],
            ['Jane Smith', 'jane@example.com', 'User', 'Inactive']
        ],
        'actions' => true, // optional, shows action buttons
        'searchable' => true, // optional, shows search box
        'paginated' => true // optional, shows pagination
    ])
--}}

<div class="bg-white shadow-sm rounded-lg border border-gray-200">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
            @if(isset($searchable) && $searchable)
            <div class="relative">
                <input type="text" 
                       placeholder="Search..." 
                       class="block w-64 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       onkeyup="filterTable(this, '{{ $title }}-table')">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200" id="{{ $title }}-table">
            <thead class="bg-gray-50">
                <tr>
                    @foreach($headers as $header)
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $header }}
                    </th>
                    @endforeach
                    @if(isset($actions) && $actions)
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($data as $row)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    @foreach($row as $cell)
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $cell }}
                    </td>
                    @endforeach
                    @if(isset($actions) && $actions)
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 transition-colors duration-200">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-900 transition-colors duration-200">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="{{ count($headers) + (isset($actions) && $actions ? 1 : 0) }}" class="px-6 py-12 text-center text-sm text-gray-500">
                        <div class="flex flex-col items-center">
                            <svg class="h-12 w-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-lg font-medium text-gray-900 mb-1">No data available</p>
                            <p class="text-gray-500">Get started by adding some data.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($paginated) && $paginated && !empty($data))
    <!-- Pagination -->
    <div class="bg-white px-6 py-3 border-t border-gray-200 flex items-center justify-between">
        <div class="flex-1 flex justify-between sm:hidden">
            <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Previous
            </button>
            <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Next
            </button>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">{{ count($data) }}</span> of <span class="font-medium">{{ count($data) }}</span> results
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                    <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</button>
                    <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
    </div>
    @endif
</div>

@if(isset($searchable) && $searchable)
@push('scripts')
<script>
function filterTable(input, tableId) {
    const filter = input.value.toLowerCase();
    const table = document.getElementById(tableId);
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        let found = false;
        
        for (let j = 0; j < cells.length; j++) {
            if (cells[j].textContent.toLowerCase().includes(filter)) {
                found = true;
                break;
            }
        }
        
        rows[i].style.display = found ? '' : 'none';
    }
}
</script>
@endpush
@endif