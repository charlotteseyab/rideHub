@extends('layouts.app')

@section('title', 'Kia Cars - RideHub')

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
                    <a href="{{ route('cars.kia') }}" class="flex items-center p-2 text-gray-900 dark:text-white rounded-lg bg-gray-100 dark:bg-gray-700">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                        <span class="ml-3">Kia</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cars.honda') }}" class="flex items-center p-2 text-gray-900 dark:text-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
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
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Kia Cars</h1>
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
                                               class="inline-flex items-center justify-center px-3 py-1.5 text-xs bg-red-600 text-white rounded-md hover:bg-red-700">
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
</main>

<!-- Add Car Modal -->
<div id="addCarModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white dark:bg-gray-800 rounded-lg max-w-lg w-full p-6 shadow-xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add New Kia</h3>
                <button onclick="closeAddCarModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form id="addCarForm" class="space-y-4">
                @csrf
                <input type="hidden" name="brand" value="kia">

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                    <input type="text" name="model" required
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Import Date</label>
                    <input type="date" name="import_date" required
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Selling Price</label>
                    <input type="number" name="selling_price" step="0.01" required
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <textarea name="description" rows="3"
                              class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Car Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                <label for="image" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-red-600 dark:text-red-400 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" accept="image/*" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                PNG, JPG, WebP up to 2MB
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeAddCarModal()"
                            class="px-4 py-2 bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        <i class="fas fa-save mr-2"></i>Save Car
                    </button>
                </div>
            </form>
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
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.tailwind.min.js"></script>
<script>
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

function openAddCarModal() {
    document.getElementById('addCarModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeAddCarModal() {
    document.getElementById('addCarModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    document.getElementById('addCarForm').reset();
}

function deleteCar(id) {
    document.getElementById('deleteForm').action = `/cars/${id}`;
    document.getElementById('deleteModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

document.getElementById('addCarForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('{{ route("cars.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Create new car element
            const carElement = document.createElement('div');
            carElement.className = 'bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-lg transition-all duration-300';
            
            const car = data.car;
            carElement.innerHTML = `
                <img src="${car.image_path ? '/storage/' + car.image_path : '{{ asset("images/car-placeholder.jpg") }}'}" 
                     alt="${car.model}" 
                     class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">${car.model}</h3>
                    <p class="text-2xl font-bold text-green-600 dark:text-green-400 mt-2">$${parseFloat(car.selling_price).toLocaleString('en-US', {minimumFractionDigits: 2})}</p>
                    <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                        <p><i class="far fa-calendar-alt mr-2"></i>Imported: ${new Date(car.import_date).toLocaleDateString('en-US', {month: 'short', day: 'numeric', year: 'numeric'})}</p>
                    </div>
                    <div class="mt-4 flex gap-2">
                        <a href="/cars/${car.id}" 
                           class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            <i class="fas fa-eye mr-2"></i>View Details
                        </a>
                        <button onclick="deleteCar(${car.id})" 
                                class="px-4 py-2 bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            
            // Add to container at the beginning
            const container = document.getElementById('carsContainer');
            container.insertBefore(carElement, container.firstChild);
            
            // Close modal and reset form
            closeAddCarModal();
            
            // Show success message
            showNotification('Car added successfully!');
        } else {
            showNotification('Error adding car. Please check the form and try again.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Error adding car. Please try again.', 'error');
    });
});

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg text-white ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} shadow-lg transition-all duration-300 transform translate-y-0`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.transform = 'translateY(100%)';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Close modals when clicking outside
document.querySelectorAll('.fixed.inset-0.bg-black.bg-opacity-50').forEach(overlay => {
    overlay.addEventListener('click', function(e) {
        if (e.target === this) {
            closeAddCarModal();
            closeDeleteModal();
        }
    });
});
</script>
@endpush