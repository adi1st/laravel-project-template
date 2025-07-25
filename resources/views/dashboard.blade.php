@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('app-name', 'Laravel Dashboard')

@section('content')
    <!-- Page Header -->
    <div class="mb-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Dashboard Overview
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Welcome back! Here's what's happening with your application.
                </p>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Data
                </button>
                <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    @include('components.dashboard.stats-grid', [
        'stats' => [
            [
                'title' => 'Total Users',
                'value' => '2,651',
                'icon' => 'users',
                'color' => 'blue',
                'trend' => '+12%',
                'trend_positive' => true,
                'subtitle' => 'Active users this month'
            ],
            [
                'title' => 'Revenue',
                'value' => '$45,231',
                'icon' => 'dollar',
                'color' => 'green',
                'trend' => '+8%',
                'trend_positive' => true,
                'subtitle' => 'Total revenue this month'
            ],
            [
                'title' => 'Orders',
                'value' => '1,423',
                'icon' => 'shopping-cart',
                'color' => 'purple',
                'trend' => '-2%',
                'trend_positive' => false,
                'subtitle' => 'Orders this month'
            ],
            [
                'title' => 'Growth',
                'value' => '24.5%',
                'icon' => 'chart',
                'color' => 'yellow',
                'trend' => '+5%',
                'trend_positive' => true,
                'subtitle' => 'Monthly growth rate'
            ]
        ]
    ])

    <!-- Charts Section -->
    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Sales Chart -->
        @include('components.dashboard.chart', [
            'title' => 'Monthly Sales',
            'type' => 'line',
            'id' => 'sales-chart',
            'data' => [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'datasets' => [
                    [
                        'label' => 'Sales 2024',
                        'data' => [12000, 19000, 15000, 25000, 22000, 30000, 28000, 35000, 32000, 38000, 42000, 45000],
                        'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 2,
                        'fill' => true,
                        'tension' => 0.4
                    ],
                    [
                        'label' => 'Sales 2023',
                        'data' => [8000, 12000, 10000, 18000, 16000, 22000, 20000, 25000, 23000, 28000, 30000, 32000],
                        'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                        'borderColor' => 'rgb(16, 185, 129)',
                        'borderWidth' => 2,
                        'fill' => true,
                        'tension' => 0.4
                    ]
                ]
            ]
        ])

        <!-- Revenue Distribution Chart -->
        @include('components.dashboard.chart', [
            'title' => 'Revenue Distribution',
            'type' => 'doughnut',
            'id' => 'revenue-chart',
            'data' => [
                'labels' => ['Products', 'Services', 'Subscriptions', 'Other'],
                'datasets' => [
                    [
                        'data' => [45, 25, 20, 10],
                        'backgroundColor' => [
                            'rgb(59, 130, 246)',
                            'rgb(16, 185, 129)',
                            'rgb(245, 158, 11)',
                            'rgb(239, 68, 68)'
                        ],
                        'borderWidth' => 2,
                        'borderColor' => '#fff'
                    ]
                ]
            ]
        ])
    </div>

    <!-- Tables Section -->
    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Recent Users Table -->
        @include('components.dashboard.table', [
            'title' => 'Recent Users',
            'headers' => ['Name', 'Email', 'Role', 'Status'],
            'data' => [
                ['John Doe', 'john@example.com', 'Admin', 'Active'],
                ['Jane Smith', 'jane@example.com', 'Editor', 'Active'],
                ['Bob Johnson', 'bob@example.com', 'User', 'Inactive'],
                ['Alice Brown', 'alice@example.com', 'User', 'Active'],
                ['Charlie Wilson', 'charlie@example.com', 'Editor', 'Active']
            ],
            'actions' => true,
            'searchable' => true
        ])

        <!-- Recent Orders Table -->
        @include('components.dashboard.table', [
            'title' => 'Recent Orders',
            'headers' => ['Order ID', 'Customer', 'Amount', 'Status'],
            'data' => [
                ['#1001', 'John Doe', '$299.99', 'Completed'],
                ['#1002', 'Jane Smith', '$149.50', 'Processing'],
                ['#1003', 'Bob Johnson', '$89.99', 'Shipped'],
                ['#1004', 'Alice Brown', '$199.99', 'Pending'],
                ['#1005', 'Charlie Wilson', '$349.99', 'Completed']
            ],
            'actions' => true,
            'searchable' => true,
            'paginated' => true
        ])
    </div>

    <!-- Additional Charts -->
    <div class="mt-8">
        @include('components.dashboard.chart', [
            'title' => 'User Growth Over Time',
            'type' => 'bar',
            'id' => 'user-growth-chart',
            'height' => '300px',
            'data' => [
                'labels' => ['Q1 2023', 'Q2 2023', 'Q3 2023', 'Q4 2023', 'Q1 2024', 'Q2 2024'],
                'datasets' => [
                    [
                        'label' => 'New Users',
                        'data' => [150, 200, 180, 250, 300, 280],
                        'backgroundColor' => 'rgba(59, 130, 246, 0.8)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'Active Users',
                        'data' => [120, 160, 140, 200, 240, 220],
                        'backgroundColor' => 'rgba(16, 185, 129, 0.8)',
                        'borderColor' => 'rgb(16, 185, 129)',
                        'borderWidth' => 1
                    ]
                ]
            ]
        ])
    </div>
@endsection