{{-- 
    Modal Component
    Usage: @include('components.dashboard.modal', [
        'id' => 'unique-modal-id',
        'title' => 'Modal Title',
        'size' => 'md', // sm, md, lg, xl, 2xl
        'footer' => true // optional
    ])
    
    Content goes in the slot
--}}

<div id="{{ $id }}" class="relative z-50 hidden" aria-labelledby="{{ $id }}-title" role="dialog" aria-modal="true">
    <!-- Background backdrop -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeModal('{{ $id }}')"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal panel -->
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 
                @switch($size ?? 'md')
                    @case('sm') sm:w-full sm:max-w-sm @break
                    @case('lg') sm:w-full sm:max-w-lg @break
                    @case('xl') sm:w-full sm:max-w-xl @break
                    @case('2xl') sm:w-full sm:max-w-2xl @break
                    @default sm:w-full sm:max-w-md
                @endswitch">
                
                <!-- Header -->
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900" id="{{ $id }}-title">
                            {{ $title }}
                        </h3>
                        <button type="button" 
                                class="rounded-md bg-white text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                onclick="closeModal('{{ $id }}')">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Content -->
                    <div class="mt-2">
                        {{ $slot ?? 'Modal content goes here' }}
                    </div>
                </div>

                <!-- Footer -->
                @if(isset($footer) && $footer)
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" 
                            class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto"
                            onclick="submitModalForm('{{ $id }}')">
                        Save
                    </button>
                    <button type="button" 
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                            onclick="closeModal('{{ $id }}')">
                        Cancel
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.style.overflow = 'auto';
    
    // Reset form if exists
    const form = document.querySelector(`#${modalId} form`);
    if (form) {
        form.reset();
        // Clear validation errors
        const errors = form.querySelectorAll('.text-red-600');
        errors.forEach(error => error.remove());
    }
}

function submitModalForm(modalId) {
    const form = document.querySelector(`#${modalId} form`);
    if (form) {
        form.submit();
    }
}

// Close modal on escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const openModals = document.querySelectorAll('[role="dialog"]:not(.hidden)');
        openModals.forEach(modal => {
            closeModal(modal.id);
        });
    }
});
</script>
@endpush