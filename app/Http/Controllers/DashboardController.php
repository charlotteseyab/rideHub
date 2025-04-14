<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get data for the past 6 months chart
        $months = collect(range(5, 0))->map(function($i) {
            return Carbon::now()->startOfMonth()->subMonths($i);
        });

        $benzData = $this->getMonthlyData('Benz', $months);
        $kiaData = $this->getMonthlyData('Kia', $months);
        $hondaData = $this->getMonthlyData('Honda', $months);

        // Prepare chart data
        $labels = $months->map(fn($month) => $month->format('F Y'));
        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Benz',
                    'data' => $benzData,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'tension' => 0.4
                ],
                [
                    'label' => 'Kia',
                    'data' => $kiaData,
                    'borderColor' => '#ef4444',
                    'backgroundColor' => 'rgba(239, 68, 68, 0.1)',
                    'tension' => 0.4
                ],
                [
                    'label' => 'Honda',
                    'data' => $hondaData,
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'tension' => 0.4
                ]
            ]
        ];

        // Calculate statistics
        $totalCars = Car::count();
        
        $lastWeek = Carbon::now()->subDays(7);
        $recentEntries = Car::where('created_at', '>=', $lastWeek)->count();

        // Get the most popular brand this month
        $currentMonth = Carbon::now()->startOfMonth();
        $popularBrand = Car::where('created_at', '>=', $currentMonth)
            ->select('brand', DB::raw('count(*) as total'))
            ->groupBy('brand')
            ->orderByDesc('total')
            ->first()
            ?->brand ?? 'N/A';

        // Get all cars for the table
        $cars = Car::orderBy('created_at', 'desc')->get();

        return view('dashboard', compact('chartData', 'totalCars', 'recentEntries', 'popularBrand', 'cars'));
    }

    private function getMonthlyData($brand, $months)
    {
        return $months->map(function($month) use ($brand) {
            return Car::where('brand', $brand)
                    ->whereYear('created_at', $month->year)
                    ->whereMonth('created_at', $month->month)
                    ->count();
        })->values();
    }
}