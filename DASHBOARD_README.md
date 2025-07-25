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