<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'brand',
        'model',
        'selling_price',
        'import_date',
        'description',
        'image_path'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'import_date' => 'date',
        'selling_price' => 'decimal:2'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
        return asset('images/car-placeholder.jpg');
    }

    /**
     * Get cars count by brand for the last 6 months
     */
    public static function getMonthlyCountsByBrand(string $brand): array
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6)->startOfMonth();
        
        return static::where('brand', $brand)
            ->where('created_at', '>=', $sixMonthsAgo)
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();
    }

    /**
     * Get the most popular brand
     */
    public static function getPopularBrand(): string
    {
        return static::selectRaw('brand, COUNT(*) as count')
            ->groupBy('brand')
            ->orderByDesc('count')
            ->first()
            ->brand ?? 'N/A';
    }

    /**
     * Get recent entries count (this month)
     */
    public static function getRecentEntriesCount(): int
    {
        return static::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
    }
} 