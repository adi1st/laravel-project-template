<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Dashboard Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration options for the Laravel Dashboard.
    | You can easily customize colors, navigation, and other settings here.
    |
    */

    'app_name' => env('DASHBOARD_APP_NAME', 'Laravel Dashboard'),

    /*
    |--------------------------------------------------------------------------
    | Theme Configuration
    |--------------------------------------------------------------------------
    */
    'theme' => [
        'primary_color' => 'blue', // blue, green, red, yellow, purple, gray
        'sidebar_bg' => 'white', // white, gray-50, gray-100
        'topbar_bg' => 'white',
    ],

    /*
    |--------------------------------------------------------------------------
    | Navigation Configuration
    |--------------------------------------------------------------------------
    */
    'navigation' => [
        [
            'name' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => 'home',
            'permission' => null, // Add permission check if needed
        ],
        [
            'name' => 'Analytics',
            'route' => 'analytics',
            'icon' => 'chart',
            'permission' => null,
        ],
        [
            'name' => 'Users',
            'route' => 'users.index',
            'icon' => 'users',
            'permission' => 'view_users',
        ],
        [
            'name' => 'Products',
            'route' => 'products.index',
            'icon' => 'box',
            'permission' => 'view_products',
        ],
        [
            'name' => 'Orders',
            'route' => 'orders.index',
            'icon' => 'shopping-cart',
            'permission' => 'view_orders',
        ],
        [
            'name' => 'Settings',
            'route' => 'settings',
            'icon' => 'cog',
            'permission' => 'access_settings',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Dashboard Features
    |--------------------------------------------------------------------------
    */
    'features' => [
        'search' => true,
        'notifications' => true,
        'profile_dropdown' => true,
        'mobile_sidebar' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Chart Colors
    |--------------------------------------------------------------------------
    */
    'chart_colors' => [
        'primary' => 'rgb(59, 130, 246)',
        'secondary' => 'rgb(16, 185, 129)',
        'tertiary' => 'rgb(245, 158, 11)',
        'quaternary' => 'rgb(239, 68, 68)',
        'quinary' => 'rgb(139, 92, 246)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Table Configuration
    |--------------------------------------------------------------------------
    */
    'table' => [
        'default_per_page' => 10,
        'show_actions' => true,
        'show_search' => true,
        'show_pagination' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Card Configuration
    |--------------------------------------------------------------------------
    */
    'cards' => [
        'default_color' => 'blue',
        'show_trends' => true,
        'show_icons' => true,
    ],
];