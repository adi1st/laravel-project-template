# Laravel Dashboard - Clean Minimalist Design

A clean, minimalist, and responsive Laravel dashboard built with Tailwind CSS. This dashboard is designed to be reusable and easily configurable for future development.

## Features

- ✅ **Responsive Design** - Works perfectly on desktop, tablet, and mobile
- ✅ **Clean & Minimalist** - Modern design with clean aesthetics
- ✅ **Reusable Components** - Modular components for easy reuse
- ✅ **Easy Configuration** - Simple configuration file for customization
- ✅ **Standard Dashboard Features**:
  - Statistics cards with trends
  - Interactive charts (Line, Bar, Doughnut, Pie)
  - Data tables with search and pagination
  - Responsive sidebar navigation
  - Mobile-friendly hamburger menu
  - User profile dropdown

## Installation & Setup

This dashboard is already configured and ready to use. The project includes:

- Laravel 12
- Tailwind CSS 4.1.11
- Chart.js for charts
- Responsive design components

## File Structure

```
resources/
├── views/
│   ├── layouts/
│   │   └── dashboard.blade.php          # Main dashboard layout
│   ├── components/
│   │   └── dashboard/
│   │       ├── card.blade.php           # Statistics card component
│   │       ├── chart.blade.php          # Chart component
│   │       ├── table.blade.php          # Data table component
│   │       ├── stats-grid.blade.php     # Stats grid layout
│   │       └── sidebar-nav.blade.php    # Sidebar navigation
│   └── dashboard.blade.php              # Main dashboard view
├── css/
│   └── app.css                          # Custom styles
config/
└── dashboard.php                        # Dashboard configuration
```

## Usage

### 1. Basic Dashboard Layout

```php
@extends('layouts.dashboard')

@section('title', 'Your Page Title')
@section('app-name', 'Your App Name')

@section('content')
    <!-- Your dashboard content here -->
@endsection
```

### 2. Statistics Cards

```php
@include('components.dashboard.card', [
    'title' => 'Total Users',
    'value' => '2,651',
    'icon' => 'users',
    'color' => 'blue',
    'trend' => '+12%',
    'trend_positive' => true,
    'subtitle' => 'Active users this month'
])
```

**Available Icons:** `users`, `dollar`, `chart`, `shopping-cart`
**Available Colors:** `blue`, `green`, `red`, `yellow`, `purple`, `gray`

### 3. Statistics Grid

```php
@include('components.dashboard.stats-grid', [
    'stats' => [
        [
            'title' => 'Total Users',
            'value' => '2,651',
            'icon' => 'users',
            'color' => 'blue',
            'trend' => '+12%',
            'trend_positive' => true
        ],
        // ... more stats
    ]
])
```

### 4. Data Tables

```php
@include('components.dashboard.table', [
    'title' => 'Recent Users',
    'headers' => ['Name', 'Email', 'Role', 'Status'],
    'data' => [
        ['John Doe', 'john@example.com', 'Admin', 'Active'],
        ['Jane Smith', 'jane@example.com', 'User', 'Active']
    ],
    'actions' => true,      // Show action buttons
    'searchable' => true,   // Enable search
    'paginated' => true     // Show pagination
])
```

### 5. Charts

#### Line Chart
```php
@include('components.dashboard.chart', [
    'title' => 'Monthly Sales',
    'type' => 'line',
    'id' => 'sales-chart',
    'data' => [
        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        'datasets' => [
            [
                'label' => 'Sales 2024',
                'data' => [12000, 19000, 15000, 25000, 22000],
                'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                'borderColor' => 'rgb(59, 130, 246)',
                'borderWidth' => 2,
                'fill' => true,
                'tension' => 0.4
            ]
        ]
    ]
])
```

#### Bar Chart
```php
@include('components.dashboard.chart', [
    'title' => 'User Growth',
    'type' => 'bar',
    'id' => 'user-chart',
    'data' => [
        'labels' => ['Q1', 'Q2', 'Q3', 'Q4'],
        'datasets' => [
            [
                'label' => 'New Users',
                'data' => [150, 200, 180, 250],
                'backgroundColor' => 'rgba(59, 130, 246, 0.8)'
            ]
        ]
    ]
])
```

#### Doughnut/Pie Chart
```php
@include('components.dashboard.chart', [
    'title' => 'Revenue Distribution',
    'type' => 'doughnut', // or 'pie'
    'id' => 'revenue-chart',
    'data' => [
        'labels' => ['Products', 'Services', 'Subscriptions'],
        'datasets' => [
            [
                'data' => [45, 25, 30],
                'backgroundColor' => [
                    'rgb(59, 130, 246)',
                    'rgb(16, 185, 129)',
                    'rgb(245, 158, 11)'
                ]
            ]
        ]
    ]
])
```

## Configuration

Edit `config/dashboard.php` to customize:

### App Name
```php
'app_name' => env('DASHBOARD_APP_NAME', 'Your Dashboard'),
```

### Theme Colors
```php
'theme' => [
    'primary_color' => 'blue',
    'sidebar_bg' => 'white',
    'topbar_bg' => 'white',
],
```

### Navigation Menu
```php
'navigation' => [
    [
        'name' => 'Dashboard',
        'route' => 'dashboard',
        'icon' => 'home',
        'permission' => null,
    ],
    // Add more navigation items
],
```

### Chart Colors
```php
'chart_colors' => [
    'primary' => 'rgb(59, 130, 246)',
    'secondary' => 'rgb(16, 185, 129)',
    // ... more colors
],
```

## Responsive Design

The dashboard is fully responsive with:

- **Desktop**: Full sidebar navigation
- **Tablet**: Collapsible sidebar
- **Mobile**: Hamburger menu with slide-out navigation

## Customization

### Adding New Icons

To add new icons to cards, edit `resources/views/components/dashboard/card.blade.php` and add your icon in the switch statement:

```php
@case('your-icon')
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <!-- Your SVG path -->
    </svg>
    @break
```

### Adding New Colors

Add new color schemes in the `$colors` array in the card component:

```php
$colors = [
    'blue' => 'bg-blue-50 text-blue-600',
    'your-color' => 'bg-your-color-50 text-your-color-600',
];
```

### Custom CSS Classes

Use the predefined CSS classes for consistency:

- `.dashboard-card` - Standard card styling
- `.dashboard-sidebar` - Sidebar container
- `.dashboard-main` - Main content area
- `.dashboard-topbar` - Top navigation bar

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Performance

- Optimized with Tailwind CSS purging
- Lazy loading for charts
- Minimal JavaScript footprint
- Responsive images and components

## Contributing

To extend the dashboard:

1. Add new components in `resources/views/components/dashboard/`
2. Update configuration in `config/dashboard.php`
3. Add custom styles in `resources/css/app.css`
4. Update this documentation

## License

This dashboard template is open-sourced software licensed under the MIT license.
## CRUD Operations with Modal Popups

The dashboard now includes complete CRUD (Create, Read, Update, Delete) operations with both modal popups and dedicated pages.

### Features Added:

#### 🔧 **Modal Components**
- **Reusable Modal Component**: `components/dashboard/modal.blade.php`
- **Form Components**: Input, Select, Textarea with validation
- **Responsive Design**: Works on all screen sizes
- **Keyboard Navigation**: ESC key to close modals
- **Dynamic Content Loading**: AJAX-powered modal content

#### 📝 **CRUD Operations**
1. **Create**: Modal popup + dedicated page (`/products/create`)
2. **Read**: List view with search/filter + detail view (`/products`)
3. **Update**: Modal popup + dedicated page (`/products/{id}/edit`)
4. **Delete**: Confirmation modal with safety measures

#### 🎯 **Product Management System**
- **Full CRUD for Products**: Complete product management
- **Search & Filter**: Real-time search and category filtering
- **Pagination**: Built-in pagination support
- **Sorting**: Sortable columns (name, price, etc.)
- **Status Management**: Active, Inactive, Draft states
- **Stock Tracking**: Inventory management

### Usage Examples:

#### Modal CRUD Operations
```php
<!-- Create Modal -->
@component('components.dashboard.modal', [
    'id' => 'create-modal',
    'title' => 'Create New Item',
    'size' => 'lg'
])
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        @include('components.dashboard.form.input', [
            'name' => 'name',
            'label' => 'Item Name',
            'required' => true
        ])
        <!-- More form fields -->
    </form>
@endcomponent

<!-- Edit Modal with AJAX -->
<script>
function editItem(id) {
    fetch(`/items/${id}/get`)
        .then(response => response.json())
        .then(data => {
            // Populate modal with data
            openModal('edit-modal');
        });
}
</script>
```

#### Form Components
```php
@include('components.dashboard.form.input', [
    'name' => 'title',
    'label' => 'Title',
    'required' => true,
    'placeholder' => 'Enter title...',
    'value' => old('title', $item->title ?? '')
])

@include('components.dashboard.form.select', [
    'name' => 'category',
    'label' => 'Category',
    'required' => true,
    'options' => [
        'option1' => 'Option 1',
        'option2' => 'Option 2'
    ],
    'value' => old('category', $item->category ?? '')
])

@include('components.dashboard.form.textarea', [
    'name' => 'description',
    'label' => 'Description',
    'rows' => 4,
    'value' => old('description', $item->description ?? '')
])
```

### Available Routes:

#### Product CRUD Routes
- `GET /products` - List all products with search/filter
- `GET /products/create` - Show create form
- `POST /products` - Store new product
- `GET /products/{id}` - Show product details
- `GET /products/{id}/edit` - Show edit form
- `PUT /products/{id}` - Update product
- `DELETE /products/{id}` - Delete product
- `GET /products/{id}/get` - Get product data (AJAX)

#### Demo Routes
- `GET /crud-demo` - CRUD operations demonstration
- `GET /dashboard/advanced` - Advanced dashboard features

### Database Schema:

The Product model includes:
```php
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->decimal('price', 10, 2);
    $table->integer('stock')->default(0);
    $table->string('category');
    $table->string('status')->default('active');
    $table->string('image')->nullable();
    $table->timestamps();
});
```

### Modal JavaScript Functions:

```javascript
// Open modal
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

// Close modal
function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// AJAX form submission
function submitForm(formId) {
    const form = document.getElementById(formId);
    // Handle form submission
}
```

### Validation & Error Handling:

- **Server-side validation** with Laravel validation rules
- **Error display** in form components
- **Success messages** with flash notifications
- **Confirmation dialogs** for destructive actions

### Customization:

1. **Modal Sizes**: `sm`, `md`, `lg`, `xl`, `2xl`
2. **Form Validation**: Built-in Laravel validation
3. **Custom Actions**: Easy to add new CRUD operations
4. **Styling**: Consistent Tailwind CSS styling

### Demo Data:

Run the seeder to populate sample products:
```bash
php artisan db:seed --class=ProductSeeder
```

This adds 12 sample products with various categories and statuses for testing all CRUD operations.