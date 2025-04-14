<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function benz()
    {
        $cars = Car::where('brand', 'benz')->orderBy('created_at', 'desc')->get();
        return view('cars.benz', compact('cars'));
    }

    public function kia()
    {
        $cars = Car::where('brand', 'kia')->orderBy('created_at', 'desc')->get();
        return view('cars.kia', compact('cars'));
    }

    public function honda()
    {
        $cars = Car::where('brand', 'honda')->orderBy('created_at', 'desc')->get();
        return view('cars.honda', compact('cars'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required|in:benz,kia,honda',
            'model' => 'required|string|max:255',
            'selling_price' => 'required|numeric|min:0',
            'import_date' => 'required|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $car = new Car();
            $car->brand = strtolower($request->brand);
            $car->model = $request->model;
            $car->selling_price = $request->selling_price;
            $car->import_date = $request->import_date;
            $car->description = $request->description;

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('public/cars', $filename);
                $car->image_path = str_replace('public/', '', $path);
            }

            $car->save();

            return response()->json([
                'success' => true,
                'message' => 'Car added successfully',
                'car' => $car
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding car: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand' => 'required|in:benz,kia,honda',
            'model' => 'required|string|max:255',
            'import_date' => 'required|date',
            'selling_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url'
        ]);

        $car->update($validated);

        return redirect()->route('cars.show', $car)
            ->with('success', 'Car updated successfully');
    }

    public function destroy($id)
    {
        try {
            $car = Car::findOrFail($id);
            
            // Delete the associated image if it exists
            if ($car->image_path) {
                Storage::delete('public/' . $car->image_path);
            }
            
            $car->delete();
            
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Car deleted successfully'
                ]);
            }
            
            return redirect()->back()->with('success', 'Car deleted successfully');
        } catch (\Exception $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting car: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Error deleting car');
        }
    }

    public function getBrandData($brand)
    {
        $cars = Car::where('brand', $brand)
            ->orderBy('created_at', 'desc')
            ->get();
            
        return response()->json([
            'count' => $cars->count(),
            'data' => $cars,
            'labels' => $this->getLastSixMonths(),
            'chart_data' => $this->getChartData($brand)
        ]);
    }

    private function getLastSixMonths()
    {
        return collect(range(5, 0))->map(function($month) {
            return Carbon::now()->subMonths($month)->format('F');
        });
    }

    private function getChartData($brand)
    {
        return collect(range(5, 0))->map(function($month) use ($brand) {
            return Car::where('brand', $brand)
                ->whereMonth('created_at', Carbon::now()->subMonths($month))
                ->count();
        });
    }
} 