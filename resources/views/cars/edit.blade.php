@extends('layouts.app')

@section('title', 'Edit Car - RideHub')

@section('header', 'Edit Car')

@section('content')
<div class="container mx-auto px-4 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('cars.show', $car->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
            <i class="fas fa-arrow-left mr-2"></i>Back to Car Details
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
        <div class="p-6">
            <form action="{{ route('cars.update', $car->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Current Image Preview -->
                @if($car->image_url)
                <div class="mb-6">
                    <img src="{{ $car->image_url }}" alt="{{ $car->brand }} {{ $car->model }}" class="w-48 h-48 object-cover rounded-lg">
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Brand -->
                    <div>
                        <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Brand</label>
                        <select id="brand" name="brand" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="Benz" {{ $car->brand == 'Benz' ? 'selected' : '' }}>Benz</option>
                            <option value="Kia" {{ $car->brand == 'Kia' ? 'selected' : '' }}>Kia</option>
                            <option value="Honda" {{ $car->brand == 'Honda' ? 'selected' : '' }}>Honda</option>
                        </select>
                        @error('brand')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Model -->
                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                        <input type="text" id="model" name="model" value="{{ old('model', $car->model) }}" 
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('model')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Import Date -->
                    <div>
                        <label for="import_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Import Date</label>
                        <input type="date" id="import_date" name="import_date" value="{{ old('import_date', $car->import_date->format('Y-m-d')) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('import_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Selling Price -->
                    <div>
                        <label for="selling_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Selling Price</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 dark:text-gray-400">$</span>
                            </div>
                            <input type="number" id="selling_price" name="selling_price" step="0.01" value="{{ old('selling_price', $car->selling_price) }}"
                                class="pl-7 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        @error('selling_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image URL -->
                    <div class="md:col-span-2">
                        <label for="image_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image URL</label>
                        <input type="url" id="image_url" name="image_url" value="{{ old('image_url', $car->image_url) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('image_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $car->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn {
        @apply px-4 py-2 rounded-lg font-medium focus:outline-none focus:ring-2 focus:ring-offset-2;
    }
    .btn-primary {
        @apply bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500;
    }
    .btn-secondary {
        @apply bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring-gray-500 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600;
    }
</style>
@endpush 