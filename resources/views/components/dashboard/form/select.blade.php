{{-- 
    Form Select Component
    Usage: @include('components.dashboard.form.select', [
        'name' => 'field_name',
        'label' => 'Field Label',
        'options' => ['value1' => 'Label 1', 'value2' => 'Label 2'],
        'value' => old('field_name', $model->field_name ?? ''),
        'required' => true,
        'placeholder' => 'Choose option...'
    ])
--}}

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if (isset($required) && $required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    <select name="{{ $name }}" id="{{ $name }}" @if (isset($required) && $required) required @endif
        class="block p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error($name) border-red-300 @enderror">

        @if (isset($placeholder))
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @if (($value ?? '') == $optionValue) selected @endif>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
