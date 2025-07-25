{{-- 
    Dashboard Chart Component
    Usage: @include('components.dashboard.chart', [
        'title' => 'Chart Title',
        'type' => 'line', // line, bar, doughnut, pie
        'id' => 'unique-chart-id',
        'data' => [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            'datasets' => [
                [
                    'label' => 'Sales',
                    'data' => [12, 19, 3, 5, 2],
                    'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                    'borderColor' => 'rgb(59, 130, 246)',
                ]
            ]
        ],
        'height' => '400px' // optional
    ])
--}}

<div class="bg-white shadow-sm rounded-lg border border-gray-200">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
    </div>

    <!-- Chart Container -->
    <div class="p-6">
        <div style="height: {{ $height ?? '400px' }}; position: relative;">
            <canvas id="{{ $id }}"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('{{ $id }}').getContext('2d');
    
    const chartData = @json($data);
    
    // Default configuration based on chart type
    let config = {
        type: '{{ $type }}',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: {}
        }
    };

    // Configure scales based on chart type
    @if($type === 'line' || $type === 'bar')
    config.options.scales = {
        x: {
            display: true,
            grid: {
                display: true,
                color: 'rgba(0, 0, 0, 0.1)'
            }
        },
        y: {
            display: true,
            grid: {
                display: true,
                color: 'rgba(0, 0, 0, 0.1)'
            },
            beginAtZero: true
        }
    };
    @endif

    @if($type === 'line')
    config.options.interaction = {
        mode: 'nearest',
        axis: 'x',
        intersect: false
    };
    @endif

    @if($type === 'doughnut' || $type === 'pie')
    config.options.plugins.legend.position = 'right';
    config.options.cutout = '{{ $type === "doughnut" ? "50%" : "0%" }}';
    @endif

    new Chart(ctx, config);
});
</script>
@endpush