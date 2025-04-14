@extends('layouts.app')

@section('title', 'Honda Cars - RideHub')

@section('content')
<!-- Sidebar -->
<aside class="fixed top-0 left-0 z-30 w-64 h-screen bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700">
    <div class="flex flex-col h-full">
        <!-- Brand Logo/Name -->
        <div class="h-16 px-4 flex items-center border-b border-gray-200 dark:border-gray-700">
            <span class="text-xl font-semibold text-gray-900 dark:text-white">RideHub</span>
        </div>
        <!-- Sidebar content -->
        <div class="flex-1 px-3 py-4 overflow-y-auto">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 dark:text-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cars.benz') }}" class="flex items-center p-2 text-gray-900 dark:text-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                        <span class="ml-3">Mercedes-Benz</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cars.kia') }}" class="flex items-center p-2 text-gray-900 dark:text-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                        <span class="ml-3">Kia</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cars.honda') }}" class="flex items-center p-2 text-gray-900 dark:text-white rounded-lg bg-gray-100 dark:bg-gray-700">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                        <span class="ml-3">Honda</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>

<!-- Main Content -->
<main class="ml-64 min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="p-4 sm:p-6 lg:p-8 flex flex-col items-center">
        <div class="w-full max-w-6xl">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Honda Cars</h1>
                <button onclick="openAddCarModal()" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <i class="fas fa-plus mr-2"></i>Add New Car
                </button>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Model</th>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Import Date</th>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Selling Price</th>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($cars as $car)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400">#{{ $car->id }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $car->model }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $car->import_date->format('M d, Y') }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">${{ number_format($car->selling_price, 2) }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            <div class="flex flex-col sm:flex-row gap-2">
                                                <a href="{{ route('cars.show', $car->id) }}" 
                                                   class="inline-flex items-center justify-center px-3 py-1.5 text-xs bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                                    <i class="fas fa-eye mr-1"></i>View
                                                </a>
                                                <button onclick="deleteCar({{ $car->id }})" 
                                                        class="inline-flex items-center justify-center px-3 py-1.5 text-xs bg-gray-600 text-white rounded-md hover:bg-gray-700">
                                                    <i class="fas fa-trash mr-1"></i>Delete
                                                </button>
                                            </div>
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
    </div>
</main>

<!-- Add Car Modal -->
<div id="addModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Add New Honda</h3>
                    <button onclick="closeAddModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form id="addCarForm" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="brand" value="honda">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Model</label>
                        <input type="text" name="model" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Import Date</label>
                        <input type="date" name="import_date" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Selling Price</label>
                        <input type="number" name="selling_price" required step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                        <textarea name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Car Image</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                                        <span>Upload a file</span>
                                        <input id="image" name="image" type="file" accept="image/*" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, WebP up to 2MB</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeAddModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Add Car
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white dark:bg-gray-800 rounded-lg max-w-md w-full p-6 shadow-xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Deletion</h3>
                <button onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <p class="text-gray-600 dark:text-gray-400 mb-4">Are you sure you want to delete this car? This action cannot be undone.</p>
            <div class="flex justify-end gap-3">
                <button onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Remove all sidebar toggle related code and keep only the necessary JavaScript
$(document).ready(function() {
    $('#carsTable').DataTable({
        responsive: true,
        pageLength: 10,
        order: [[0, 'asc']],
        language: {
            search: "Search cars:",
            lengthMenu: "Show _MENU_ cars per page",
        }
    });
});

// Your existing modal and form handling code...
</script>
@endpush
@endsection