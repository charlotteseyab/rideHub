<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for Mercedes-Benz cars
        $this->createCars('benz', [
            ['E-Class', 55000],
            ['C-Class', 45000],
            ['S-Class', 95000],
            ['GLC', 52000],
            ['A-Class', 35000],
        ]);

        // Sample data for Kia cars
        $this->createCars('kia', [
            ['Sportage', 32000],
            ['Seltos', 28000],
            ['Telluride', 42000],
            ['K5', 30000],
            ['Sorento', 35000],
        ]);

        // Sample data for Honda cars
        $this->createCars('honda', [
            ['Civic', 25000],
            ['CR-V', 32000],
            ['Accord', 28000],
            ['Pilot', 38000],
            ['HR-V', 26000],
        ]);
    }

    /**
     * Create cars for a specific brand with different import dates
     */
    private function createCars(string $brand, array $models): void
    {
        foreach ($models as $index => $model) {
            // Create multiple entries over the last 6 months for each model
            for ($i = 0; $i < rand(2, 4); $i++) {
                Car::create([
                    'brand' => $brand,
                    'model' => $model[0],
                    'selling_price' => $model[1] + rand(-2000, 2000), // Add some price variation
                    'import_date' => Carbon::now()->subMonths(rand(0, 5))->subDays(rand(0, 30)),
                    'description' => "This {$brand} {$model[0]} is a premium vehicle with excellent features and performance.",
                    'image_url' => "https://example.com/images/{$brand}/{$model[0]}.jpg",
                    'created_at' => Carbon::now()->subMonths(rand(0, 5))->subDays(rand(0, 30)),
                ]);
            }
        }
    }
} 