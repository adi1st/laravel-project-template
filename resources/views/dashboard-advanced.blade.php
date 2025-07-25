@extends('layouts.dashboard')

@section('title', 'Advanced Dashboard Example')
@section('app-name', 'Laravel Dashboard Pro')

@section('content')
    <!-- Page Header -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">
            Advanced Dashboard Features
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            Demonstration of all available components and features.
        </p>
    </div>

    <!-- Quick Actions -->
    <div class="mb-8">
        @include('components.dashboard.quick-actions', [
            'actions' => [
                [
                    'title' => 'Add New User',
                    'description' => 'Create a new user account',
                    'icon' => 'user-plus',
                    'color' => 'blue',
                    'href' => '#'
                ],
                [
                    'title' => 'Generate Report',
                    'description' => 'Create monthly analytics report',
                    'icon' => 'document-plus',
                    'color' => 'green',
                    'href' => '#'
                ],
                [
                    'title' => 'System Settings',
                    'description' => 'Configure application settings',
                    'icon' => 'cog',
                    'color' => 'purple',
                    'href' => '#'
                ]
            ]
        ])
    </div>

    <!-- Advanced Stats Grid -->
    @include('components.dashboard.stats-grid', [
        'stats' => [
            [
                'title' => 'Active Sessions',
                'value' => '1,429',
                'icon' => 'users',
                'color' => 'blue',
                'trend' => '+18%',
                'trend_positive' => true,
                'subtitle' => 'Currently online users'
            ],
            [
                'title' => 'Server Load',
                'value' => '23%',
                'icon' => 'chart',
                'color' => 'green',
                'trend' => '-5%',
                'trend_positive' => true,
                'subtitle' => 'CPU utilization'
            ],
            [
                'title' => 'Memory Usage',
                'value' => '67%',
                'icon' => 'chart',
                'color' => 'yellow',
                'trend' => '+2%',
                'trend_positive' => false,
                'subtitle' => 'RAM consumption'
            ],
            [
                'title' => 'Error Rate',
                'value' => '0.02%',
                'icon' => 'chart',
                'color' => 'red',
                'trend' => '-12%',
                'trend_positive' => true,
                'subtitle' => 'Application errors'
            ]
        ]
    ])

    <!-- Widget Examples -->
    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Collapsible Widget -->
        @component('components.dashboard.widget', [
            'title' => 'System Monitoring',
            'subtitle' => 'Real-time system metrics',
            'collapsible' => true,
            'actions' => true
        ])
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">CPU Usage</span>
                    <span class="text-sm text-gray-500">23%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: 23%"></div>
                </div>
                
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">Memory</span>
                    <span class="text-sm text-gray-500">67%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 67%"></div>
                </div>
                
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">Disk Space</span>
                    <span class="text-sm text-gray-500">45%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 45%"></div>
                </div>
            </div>
        @endcomponent

        <!-- Activity Feed Widget -->
        @component('components.dashboard.widget', [
            'title' => 'Recent Activity',
            'subtitle' => 'Latest system events',
            'actions' => true
        ])
            <div class="flow-root">
                <ul role="list" class="-mb-8">
                    <li>
                        <div class="relative pb-8">
                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></span>
                            <div class="relative flex space-x-3">
                                <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                    <div>
                                        <p class="text-sm text-gray-500">New user <span class="font-medium text-gray-900">John Doe</span> registered</p>
                                    </div>
                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">2m ago</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="relative pb-8">
                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></span>
                            <div class="relative flex space-x-3">
                                <div class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Payment processed for order <span class="font-medium text-gray-900">#1234</span></p>
                                    </div>
                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">5m ago</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="relative">
                            <div class="relative flex space-x-3">
                                <div class="h-8 w-8 rounded-full bg-purple-500 flex items-center justify-center ring-8 ring-white">
                                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h4a1 1 0 011 1v2h4a1 1 0 110 2h-1v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6H3a1 1 0 110-2h4z"></path>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                    <div>
                                        <p class="text-sm text-gray-500">System backup completed successfully</p>
                                    </div>
                                    <div class="text-right text-sm whitespace-nowrap text-gray-500">10m ago</div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        @endcomponent
    </div>

    <!-- Advanced Charts -->
    <div class="mt-8 grid grid-cols-1 gap-6">
        @include('components.dashboard.chart', [
            'title' => 'Multi-Dataset Performance Metrics',
            'type' => 'line',
            'id' => 'performance-chart',
            'height' => '350px',
            'data' => [
                'labels' => ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00'],
                'datasets' => [
                    [
                        'label' => 'Response Time (ms)',
                        'data' => [120, 95, 180, 160, 140, 110],
                        'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 2,
                        'fill' => true,
                        'tension' => 0.4,
                        'yAxisID' => 'y'
                    ],
                    [
                        'label' => 'Requests/sec',
                        'data' => [850, 920, 750, 680, 780, 890],
                        'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                        'borderColor' => 'rgb(16, 185, 129)',
                        'borderWidth' => 2,
                        'fill' => true,
                        'tension' => 0.4,
                        'yAxisID' => 'y1'
                    ]
                ]
            ]
        ])
    </div>

    <!-- Advanced Table with Custom Actions -->
    <div class="mt-8">
        @include('components.dashboard.table', [
            'title' => 'User Management',
            'headers' => ['Avatar', 'Name', 'Email', 'Role', 'Last Login', 'Status'],
            'data' => [
                ['👤', 'John Doe', 'john@example.com', 'Administrator', '2 minutes ago', '🟢 Online'],
                ['👤', 'Jane Smith', 'jane@example.com', 'Editor', '1 hour ago', '🟡 Away'],
                ['👤', 'Bob Johnson', 'bob@example.com', 'User', '2 days ago', '🔴 Offline'],
                ['👤', 'Alice Brown', 'alice@example.com', 'Moderator', '5 minutes ago', '🟢 Online'],
                ['👤', 'Charlie Wilson', 'charlie@example.com', 'User', '1 day ago', '🟡 Away']
            ],
            'actions' => true,
            'searchable' => true,
            'paginated' => true
        ])
    </div>
@endsection