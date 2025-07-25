@extends('layouts.dashboard')

@section('title', 'Products Management')
@section('app-name', 'Laravel Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="mb-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Products Management
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Manage your product inventory with full CRUD operations.
                </p>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <button type="button" onclick="openModal('create-product-modal')"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Product
                </button>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200 mb-6">
        <div class="p-6">
            <form method="GET" action="{{ route('products.index') }}"
                class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Search -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        placeholder="Search products..."
                        class="p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                </div>

                <!-- Category Filter -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="category" id="category"
                        class="p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                {{ ucfirst($category) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Filter -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status"
                        class="p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex items-end space-x-2">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                        Filter
                    </button>
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        Clear
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="mb-6 rounded-md bg-green-50 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Products Table -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Products ({{ $products->total() }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'name', 'sort_direction' => request('sort_direction') == 'asc' ? 'desc' : 'asc']) }}"
                                class="group inline-flex">
                                Name
                                <span class="ml-2 flex-none rounded text-gray-400 group-hover:text-gray-500">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                        <path
                                            d="M10 17a1 1 0 01-.707-.293l-3-3a1 1 0 011.414-1.414L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3A1 1 0 0110 17z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </a>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'price', 'sort_direction' => request('sort_direction') == 'asc' ? 'desc' : 'asc']) }}"
                                class="group inline-flex">
                                Price
                                <span class="ml-2 flex-none rounded text-gray-400 group-hover:text-gray-500">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                        <path
                                            d="M10 17a1 1 0 01-.707-.293l-3-3a1 1 0 011.414-1.414L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3A1 1 0 0110 17z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </a>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-lg bg-gray-200 flex items-center justify-center">
                                            <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($product->description, 50) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ ucfirst($product->category) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $product->formatted_price }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : ($product->stock > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $product->stock }} units
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{!! $product->status_badge !!}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $product->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <!-- View Button -->
                                    <button onclick="viewProduct({{ $product->id }})"
                                        class="text-blue-600 hover:text-blue-900 transition-colors duration-200"
                                        title="View">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </button>

                                    <!-- Edit Button -->
                                    <button onclick="editProduct({{ $product->id }})"
                                        class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200"
                                        title="Edit">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </button>

                                    <!-- Delete Button -->
                                    <button onclick="deleteProduct({{ $product->id }}, '{{ $product->name }}')"
                                        class="text-red-600 hover:text-red-900 transition-colors duration-200"
                                        title="Delete">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-sm text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="h-12 w-12 text-gray-300 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    <p class="text-lg font-medium text-gray-900 mb-1">No products found</p>
                                    <p class="text-gray-500">Get started by creating your first product.</p>
                                    <button onclick="openModal('create-product-modal')"
                                        class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Add Product
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($products->hasPages())
            <div class="bg-white px-6 py-3 border-t border-gray-200">
                {{ $products->links() }}
            </div>
        @endif
    </div>

    <!-- Create Product Modal -->
    @component('components.dashboard.modal', [
        'id' => 'create-product-modal',
        'title' => 'Create New Product',
        'size' => 'lg',
    ])
        <form id="create-product-form" action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                @include('components.dashboard.form.input', [
                    'name' => 'name',
                    'label' => 'Product Name',
                    'required' => true,
                    'placeholder' => 'Enter product name...',
                ])

                @include('components.dashboard.form.select', [
                    'name' => 'category',
                    'label' => 'Category',
                    'required' => true,
                    'placeholder' => 'Select category...',
                    'options' => [
                        'electronics' => 'Electronics',
                        'clothing' => 'Clothing',
                        'books' => 'Books',
                        'home' => 'Home & Garden',
                        'sports' => 'Sports',
                        'toys' => 'Toys',
                        'other' => 'Other',
                    ],
                ])

                @include('components.dashboard.form.input', [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'required' => true,
                    'placeholder' => '0.00',
                    'help' => 'Enter price in USD',
                ])

                @include('components.dashboard.form.input', [
                    'name' => 'stock',
                    'label' => 'Stock Quantity',
                    'type' => 'number',
                    'required' => true,
                    'placeholder' => '0',
                ])

                @include('components.dashboard.form.select', [
                    'name' => 'status',
                    'label' => 'Status',
                    'required' => true,
                    'value' => 'active',
                    'options' => [
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'draft' => 'Draft',
                    ],
                ])

                @include('components.dashboard.form.input', [
                    'name' => 'image',
                    'label' => 'Image URL',
                    'placeholder' => 'https://example.com/image.jpg',
                ])
            </div>

            @include('components.dashboard.form.textarea', [
                'name' => 'description',
                'label' => 'Description',
                'placeholder' => 'Enter product description...',
                'rows' => 3,
            ])

            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeModal('create-product-modal')"
                    class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700">
                    Create Product
                </button>
            </div>
        </form>
    @endcomponent

    <!-- View Product Modal -->
    @component('components.dashboard.modal', [
        'id' => 'view-product-modal',
        'title' => 'Product Details',
        'size' => 'lg',
    ])
        <div id="view-product-content">
            <!-- Content will be loaded dynamically -->
        </div>
    @endcomponent

    <!-- Edit Product Modal -->
    @component('components.dashboard.modal', [
        'id' => 'edit-product-modal',
        'title' => 'Edit Product',
        'size' => 'lg',
    ])
        <form id="edit-product-form" method="POST">
            @csrf
            @method('PUT')

            <div id="edit-product-content">
                <!-- Content will be loaded dynamically -->
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeModal('edit-product-modal')"
                    class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700">
                    Update Product
                </button>
            </div>
        </form>
    @endcomponent

    <!-- Delete Confirmation Modal -->
    @component('components.dashboard.modal', [
        'id' => 'delete-product-modal',
        'title' => 'Delete Product',
        'size' => 'md',
    ])
        <div class="sm:flex sm:items-start">
            <div
                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Delete Product</h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to delete "<span id="delete-product-name" class="font-medium"></span>"? This
                        action cannot be undone.
                    </p>
                </div>
            </div>
        </div>

        <form id="delete-product-form" method="POST" class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                Delete
            </button>
            <button type="button" onclick="closeModal('delete-product-modal')"
                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                Cancel
            </button>
        </form>
    @endcomponent

@endsection

@push('scripts')
    <script>
        // View Product
        function viewProduct(productId) {
            fetch(`/products/${productId}/get`)
                .then(response => response.json())
                .then(product => {
                    const content = `
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Product Name</h4>
                        <p class="mt-1 text-sm text-gray-900">${product.name}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Category</h4>
                        <p class="mt-1 text-sm text-gray-900">${product.category}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Price</h4>
                        <p class="mt-1 text-sm text-gray-900">$${parseFloat(product.price).toFixed(2)}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Stock</h4>
                        <p class="mt-1 text-sm text-gray-900">${product.stock} units</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Status</h4>
                        <p class="mt-1 text-sm text-gray-900">${product.status}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Created</h4>
                        <p class="mt-1 text-sm text-gray-900">${new Date(product.created_at).toLocaleDateString()}</p>
                    </div>
                </div>
                ${product.description ? `
                            <div class="mt-6">
                                <h4 class="text-sm font-medium text-gray-500">Description</h4>
                                <p class="mt-1 text-sm text-gray-900">${product.description}</p>
                            </div>
                        ` : ''}
            `;
                    document.getElementById('view-product-content').innerHTML = content;
                    openModal('view-product-modal');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error loading product details');
                });
        }

        // Edit Product
        function editProduct(productId) {
            fetch(`/products/${productId}/get`)
                .then(response => response.json())
                .then(product => {
                    const content = `
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="mb-4">
                        <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1">Product Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="edit_name" value="${product.name}" required class="p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    
                    <div class="mb-4">
                        <label for="edit_category" class="block text-sm font-medium text-gray-700 mb-1">Category <span class="text-red-500">*</span></label>
                        <select name="category" id="edit_category" required class="p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            <option value="electronics" ${product.category === 'electronics' ? 'selected' : ''}>Electronics</option>
                            <option value="clothing" ${product.category === 'clothing' ? 'selected' : ''}>Clothing</option>
                            <option value="books" ${product.category === 'books' ? 'selected' : ''}>Books</option>
                            <option value="home" ${product.category === 'home' ? 'selected' : ''}>Home & Garden</option>
                            <option value="sports" ${product.category === 'sports' ? 'selected' : ''}>Sports</option>
                            <option value="toys" ${product.category === 'toys' ? 'selected' : ''}>Toys</option>
                            <option value="other" ${product.category === 'other' ? 'selected' : ''}>Other</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="edit_price" class="block text-sm font-medium text-gray-700 mb-1">Price <span class="text-red-500">*</span></label>
                        <input type="number" step="0.01" name="price" id="edit_price" value="${product.price}" required class="p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    
                    <div class="mb-4">
                        <label for="edit_stock" class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity <span class="text-red-500">*</span></label>
                        <input type="number" name="stock" id="edit_stock" value="${product.stock}" required class="p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    
                    <div class="mb-4">
                        <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
                        <select name="status" id="edit_status" required class="p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            <option value="active" ${product.status === 'active' ? 'selected' : ''}>Active</option>
                            <option value="inactive" ${product.status === 'inactive' ? 'selected' : ''}>Inactive</option>
                            <option value="draft" ${product.status === 'draft' ? 'selected' : ''}>Draft</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="edit_image" class="block text-sm font-medium text-gray-700 mb-1">Image URL</label>
                        <input type="text" name="image" id="edit_image" value="${product.image || ''}" class="p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="edit_description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" id="edit_description" rows="3" class="p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">${product.description || ''}</textarea>
                </div>
            `;

                    document.getElementById('edit-product-content').innerHTML = content;
                    document.getElementById('edit-product-form').action = `/products/${productId}`;
                    openModal('edit-product-modal');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error loading product details');
                });
        }

        // Delete Product
        function deleteProduct(productId, productName) {
            document.getElementById('delete-product-name').textContent = productName;
            document.getElementById('delete-product-form').action = `/products/${productId}`;
            openModal('delete-product-modal');
        }
    </script>
@endpush
