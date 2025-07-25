{{-- 
    Dashboard Stats Grid Component
    Usage: @include('components.dashboard.stats-grid', [
        'stats' => [
            [
                'title' => 'Total Users',
                'value' => '1,234',
                'icon' => 'users',
                'color' => 'blue',
                'trend' => '+12%',
                'trend_positive' => true
            ],
            // ... more stats
        ]
    ])
--}}

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
    @foreach($stats as $stat)
        @include('components.dashboard.card', $stat)
    @endforeach
</div>