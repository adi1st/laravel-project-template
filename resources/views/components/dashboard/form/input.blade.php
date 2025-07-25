{{-- 
    Form Input Component
    Usage: @include('components.dashboard.form.input', [
        'name' => 'field_name',
        'label' => 'Field Label',
        'type' => 'text', // text, email, password, number, etc.
        'value' => old('field_name', $model->field_name ?? ''),
        'required' => true,
        'placeholder' => 'Enter value...',
        'help' => 'Help text'
    ])
--}}

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if (isset($required) && $required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value ?? '' }}"
        placeholder="{{ $placeholder ?? '' }}" @if (isset($required) && $required) required @endif
        class="block p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error($name) border-red-300 @enderror">

    @if (isset($help))
        <p class="mt-1 text-sm text-gray-500">{{ $help }}</p>
    @endif

    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
