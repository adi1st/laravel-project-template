@extends('layouts.dashboard')

@section('title', 'Edit Product')
@section('app-name', 'Laravel Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="mb-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-4">
                        <li>
                            <div>
                                <a href="{{ route('products.index') }}" class="text-gray-400 hover:text-gray-500">
                                    <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L9 5.414V17a1 1 0 102 0V5.414l5.293 5.293a1 1 0 001.414-1.414l-7-7z"></path>
                                    </svg>
                                    <span class="sr-only">Products</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('products.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Products</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('products.show', $product) }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ Str::limit($product->name, 20) }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-4 text-sm font-medium text-gray-500">Edit</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h2 class="mt-2 text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Edit Product: {{ $product->name }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Update product information and settings.
                </p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Product Information</h3>
        </div>
        
        <form action="{{ route('products.update', $product) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                @include('components.dashboard.form.input', [
                    'name' => 'name',
                    'label' => 'Product Name',
                    'required' => true,
                    'placeholder' => 'Enter product name...',
                    'value' => old('name', $product->name)
                ])

                @include('components.dashboard.form.select', [
                    'name' => 'category',
                    'label' => 'Category',
                    'required' => true,
                    'placeholder' => 'Select category...',
                    'value' => old('category', $product->category),
                    'options' => [
                        'electronics' => 'Electronics',
                        'clothing' => 'Clothing',
                        'books' => 'Books',
                        'home' => 'Home & Garden',
                        'sports' => 'Sports',
                        'toys' => 'Toys',
                        'other' => 'Other'
                    ]
                ])

                @include('components.dashboard.form.input', [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'required' => true,
                    'placeholder' => '0.00',
                    'help' => 'Enter price in USD',
                    'value' => old('price', $product->price)
                ])

                @include('components.dashboard.form.input', [
                    'name' => 'stock',
                    'label' => 'Stock Quantity',
                    'type' => 'number',
                    'required' => true,
                    'placeholder' => '0',
                    'value' => old('stock', $product->stock)
                ])

                @include('components.dashboard.form.select', [
                    'name' => 'status',
                    'label' => 'Status',
                    'required' => true,
                    'value' => old('status', $product->status),
                    'options' => [
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'draft' => 'Draft'
                    ]
                ])

                @include('components.dashboard.form.input', [
                    'name' => 'image',
                    'label' => 'Image URL',
                    'placeholder' => 'https://example.com/image.jpg',
                    'value' => old('image', $product->image)
                ])
            </div>

            <div class="mt-6">
                @include('components.dashboard.form.textarea', [
                    'name' => 'description',
                    'label' => 'Description',
                    'placeholder' => 'Enter product description...',
                    'rows' => 4,
                    'value' => old('description', $product->description)
                ])
            </div>

            <!-- Product Metadata -->
            <div class="mt-8 border-t border-gray-200 pt-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Product Metadata</h4>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Product ID</label>
                        <p class="mt-1 text-sm text-gray-900">#{{ $product->id }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Created</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $product->created_at->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $product->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('products.show', $product) }}" 
                   class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" 
                        class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700">
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection