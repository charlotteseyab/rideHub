@extends('layouts.app')

@section('title', 'Dashboard - RideHub')

@section('header', 'Dashboard Overview')

@push('styles')
<style>
    .stats-card {
        transition: transform 0.2s;
        @apply bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6;
    }
    .stats-card:hover {
        transform: translateY(-5px);
    }
    .card-zoom {
        transition: transform 0.3s ease-in-out;
    }
    .card-zoom:hover {
        transform: scale(1.02);
    }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    {{-- <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">Dashboard Overview</h1> --}}

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
        <!-- Total Cars Card -->
        <div class="bg-blue-500 rounded-lg shadow-lg p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4">
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2 sm:mb-0">Total Cars</h3>
                <div class="p-2 sm:p-3 bg-white bg-opacity-20 rounded-full">
                    <i class="fas fa-car text-white text-lg sm:text-xl"></i>
                </div>
            </div>
            <div class="flex items-baseline">
                <p class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white">{{ $totalCars }}</p>
                <p class="ml-2 text-sm text-blue-100">vehicles</p>
            </div>
        </div>

        <!-- Recent Entries Card -->
        <div class="bg-green-500 rounded-lg shadow-lg p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4">
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2 sm:mb-0">Recent Entries</h3>
                <div class="p-2 sm:p-3 bg-white bg-opacity-20 rounded-full">
                    <i class="fas fa-clock text-white text-lg sm:text-xl"></i>
                </div>
            </div>
            <div class="flex items-baseline">
                <p class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white">{{ $recentEntries }}</p>
                <p class="ml-2 text-sm text-green-100">this month</p>
            </div>
        </div>

        <!-- Popular Brand Card -->
        <div class="bg-purple-500 rounded-lg shadow-lg p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4">
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2 sm:mb-0">Popular Brand</h3>
                <div class="p-2 sm:p-3 bg-white bg-opacity-20 rounded-full">
                    <i class="fas fa-trophy text-white text-lg sm:text-xl"></i>
                </div>
            </div>
            <div class="flex items-baseline">
                <p class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white capitalize">{{ $popularBrand }}</p>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 sm:p-6 mb-6 sm:mb-8">
        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-white mb-4 sm:mb-6">Car Entries by Brand (Last 6 Months)</h2>
        <div class="relative" style="min-height: 300px; height: 50vh;">
            <canvas id="carChart"></canvas>
        </div>
    </div>

    <!-- Recent Cars Table -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <div class="p-4 sm:p-6">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-white mb-4 sm:mb-6">Last 5 Added Cars</h2>
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-3 sm:px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Brand</th>
                                <th class="px-3 sm:px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Model</th>
                                <th class="hidden sm:table-cell px-3 sm:px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Import Date</th>
                                <th class="px-3 sm:px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Price</th>
                                <th class="px-3 sm:px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($cars->take(5) as $car)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white capitalize">{{ $car->brand }}</td>
                                <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $car->model }}</td>
                                <td class="hidden sm:table-cell px-3 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $car->import_date->format('M d, Y') }}</td>
                                <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">${{ number_format($car->selling_price, 2) }}</td>
                                <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                    <a href="{{ route('cars.show', $car->id) }}" class="inline-flex items-center text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                        <i class="fas fa-eye"></i>
                                        <span class="hidden sm:inline ml-1">View</span>
                                    </a>
                                    <a href="{{ route('cars.edit', $car->id) }}" class="inline-flex items-center text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">
                                        <i class="fas fa-edit"></i>
                                        <span class="hidden sm:inline ml-1">Edit</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('carChart').getContext('2d');
    
    // Get last 6 months
    const months = [];
    const today = new Date();
    for (let i = 5; i >= 0; i--) {
        const d = new Date(today.getFullYear(), today.getMonth() - i, 1);
        months.push(d.toLocaleString('default', { month: 'short' }));
    }

    // Responsive font size based on screen width
    const getFontSize = () => {
        return window.innerWidth < 768 ? 10 : 12;
    };

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [
                {
                    label: 'Mercedes-Benz',
                    data: [4, 6, 5, 8, 7, 9],
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Kia',
                    data: [3, 4, 6, 5, 7, 8],
                    borderColor: '#10B981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Honda',
                    data: [5, 7, 4, 6, 8, 7],
                    borderColor: '#8B5CF6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index'
            },
            plugins: {
                legend: {
                    position: window.innerWidth < 768 ? 'bottom' : 'top',
                    labels: {
                        boxWidth: window.innerWidth < 768 ? 8 : 12,
                        padding: window.innerWidth < 768 ? 10 : 20,
                        font: {
                            size: getFontSize()
                        },
                        color: document.documentElement.classList.contains('dark') ? '#fff' : '#000'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: window.innerWidth < 768 ? 8 : 12,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    titleFont: {
                        size: getFontSize()
                    },
                    bodyFont: {
                        size: getFontSize() - 1
                    },
                    usePointStyle: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                    },
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: getFontSize()
                        },
                        color: document.documentElement.classList.contains('dark') ? '#fff' : '#000'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: getFontSize()
                        },
                        color: document.documentElement.classList.contains('dark') ? '#fff' : '#000'
                    }
                }
            }
        }
    });

    // Update chart responsiveness on window resize
    window.addEventListener('resize', function() {
        Chart.instances[0].options.plugins.legend.position = window.innerWidth < 768 ? 'bottom' : 'top';
        Chart.instances[0].update();
    });
});
</script>
@endpush 