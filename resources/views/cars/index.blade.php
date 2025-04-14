@extends('layouts.app')

@section('title', $brand . ' Cars - RideHub')

@section('header')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $brand }} Cars</h1>
        <button onclick="openAddCarModal()" class="btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Car
        </button>
    </div>
@endsection

@push('styles')
<style>
    .car-grid {
        @apply grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6;
    }
    .car-card {
        @apply bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300;
    }
    .car-image {
        @apply w-full h-48 object-cover rounded-t-xl;
    }
    .car-content {
        @apply p-6;
    }
    .car-title {
        @apply text-lg font-semibold text-gray-900 dark:text-white mb-2;
    }
    .car-price {
        @apply text-2xl font-bold text-blue-600 dark:text-blue-400;
    }
    .car-meta {
        @apply mt-4 flex items-center text-sm text-gray-500 dark:text-gray-400;
    }
    .btn-primary {
        @apply px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center;
    }
    .btn-secondary {
        @apply px-4 py-2 bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200;
    }
    .modal {
        @apply fixed inset-0 z-50 overflow-y-auto;
    }
    .modal-overlay {
        @apply fixed inset-0 bg-black bg-opacity-50 transition-opacity;
    }
    .modal-content {
        @apply relative bg-white dark:bg-gray-800 rounded-xl mx-auto my-8 max-w-2xl w-full shadow-xl p-6;
    }
    .form-group {
        @apply mb-4;
    }
    .form-label {
        @apply block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1;
    }
    .form-input {
        @apply w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500;
    }
    .form-error {
        @apply mt-1 text-sm text-red-600 dark:text-red-400;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Filters -->
    <div class="mb-6 flex flex-wrap gap-4 items-center justify-between bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm">
        <div class="flex gap-4">
            <select class="form-input" onchange="filterCars(this.value)">
                <option value="">All Models</option>
                @foreach($models as $model)
                    <option value="{{ $model }}">{{ $model }}</option>
                @endforeach
            </select>
            <select class="form-input" onchange="sortCars(this.value)">
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
                <option value="price_asc">Price: Low to High</option>
                <option value="price_desc">Price: High to Low</option>
            </select>
        </div>
        <div class="relative">
            <input type="text" 
                   placeholder="Search cars..." 
                   class="form-input pl-10"
                   onkeyup="searchCars(this.value)">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
    </div>

    <!-- Car Grid -->
    <div class="car-grid" id="carsContainer">
        @foreach($cars as $car)
        <div class="car-card" data-model="{{ $car->model }}">
            <img src="{{ $car->image_url ?? asset('images/car-placeholder.jpg') }}" 
                 alt="{{ $car->brand }} {{ $car->model }}"
                 class="car-image">
            <div class="car-content">
                <h3 class="car-title">{{ $car->model }}</h3>
                <p class="car-price">${{ number_format($car->selling_price, 2) }}</p>
                <div class="car-meta">
                    <i class="far fa-calendar-alt mr-2"></i>
                    <span>Imported: {{ $car->import_date->format('M d, Y') }}</span>
                </div>
                <div class="mt-4 flex gap-2">
                    <a href="{{ route('cars.show', $car->id) }}" class="btn-primary flex-1">
                        <i class="fas fa-eye mr-2"></i>View Details
                    </a>
                    <button onclick="deleteCar({{ $car->id }})" class="btn-secondary">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Add Car Modal -->
<div id="addCarModal" class="modal hidden">
    <div class="modal-overlay"></div>
    <div class="modal-content">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Add New {{ $brand }} Car</h3>
            <button onclick="closeAddCarModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form id="addCarForm" action="{{ route('cars.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="brand" value="{{ $brand }}">
            
            <div class="form-group">
                <label class="form-label" for="model">Model</label>
                <input type="text" id="model" name="model" class="form-input" required>
                <p class="form-error hidden" id="modelError"></p>
            </div>

            <div class="form-group">
                <label class="form-label" for="import_date">Import Date</label>
                <input type="date" id="import_date" name="import_date" class="form-input" required>
                <p class="form-error hidden" id="importDateError"></p>
            </div>

            <div class="form-group">
                <label class="form-label" for="selling_price">Selling Price</label>
                <input type="number" id="selling_price" name="selling_price" step="0.01" class="form-input" required>
                <p class="form-error hidden" id="sellingPriceError"></p>
            </div>

            <div class="form-group">
                <label class="form-label" for="description">Description</label>
                <textarea id="description" name="description" rows="3" class="form-input"></textarea>
                <p class="form-error hidden" id="descriptionError"></p>
            </div>

            <div class="form-group">
                <label class="form-label" for="image_url">Image URL</label>
                <input type="url" id="image_url" name="image_url" class="form-input">
                <p class="form-error hidden" id="imageUrlError"></p>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeAddCarModal()" class="btn-secondary">
                    Cancel
                </button>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save mr-2"></i>Save Car
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal hidden">
    <div class="modal-overlay"></div>
    <div class="modal-content">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Deletion</h3>
            <button onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <p class="text-gray-600 dark:text-gray-300 mb-4">Are you sure you want to delete this car? This action cannot be undone.</p>
        <div class="flex justify-end space-x-3">
            <button onclick="closeDeleteModal()" class="btn-secondary">Cancel</button>
            <form id="deleteForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-primary bg-red-600 hover:bg-red-700">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openAddCarModal() {
    document.getElementById('addCarModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeAddCarModal() {
    document.getElementById('addCarModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
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

function filterCars(model) {
    const cards = document.querySelectorAll('.car-card');
    cards.forEach(card => {
        if (!model || card.dataset.model === model) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

function sortCars(option) {
    const container = document.getElementById('carsContainer');
    const cards = Array.from(container.children);
    
    cards.sort((a, b) => {
        const aPrice = parseFloat(a.querySelector('.car-price').textContent.replace('$', '').replace(',', ''));
        const bPrice = parseFloat(b.querySelector('.car-price').textContent.replace('$', '').replace(',', ''));
        
        switch(option) {
            case 'price_asc':
                return aPrice - bPrice;
            case 'price_desc':
                return bPrice - aPrice;
            case 'newest':
                return new Date(b.querySelector('.car-meta span').textContent.replace('Imported: ', '')) - 
                       new Date(a.querySelector('.car-meta span').textContent.replace('Imported: ', ''));
            case 'oldest':
                return new Date(a.querySelector('.car-meta span').textContent.replace('Imported: ', '')) - 
                       new Date(b.querySelector('.car-meta span').textContent.replace('Imported: ', ''));
        }
    });
    
    cards.forEach(card => container.appendChild(card));
}

function searchCars(query) {
    const cards = document.querySelectorAll('.car-card');
    const searchQuery = query.toLowerCase();
    
    cards.forEach(card => {
        const model = card.querySelector('.car-title').textContent.toLowerCase();
        const visible = model.includes(searchQuery);
        card.style.display = visible ? 'block' : 'none';
    });
}

// Close modals when clicking outside
document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', function(e) {
        if (e.target === this) {
            closeAddCarModal();
            closeDeleteModal();
        }
    });
});

document.getElementById('addCarForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Reset error messages
    document.querySelectorAll('.form-error').forEach(error => {
        error.classList.add('hidden');
        error.textContent = '';
    });
    
    // Get form data
    const formData = new FormData(this);
    
    // Submit form via AJAX
    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Close modal
            closeAddCarModal();
            
            // Create new car card
            const carCard = createCarCard(data.car);
            
            // Add to container
            const container = document.getElementById('carsContainer');
            container.insertBefore(carCard, container.firstChild);
            
            // Reset form
            document.getElementById('addCarForm').reset();
            
            // Show success message
            showNotification('Car added successfully!', 'success');
        } else {
            // Handle validation errors
            Object.keys(data.errors).forEach(field => {
                const error = document.getElementById(field + 'Error');
                if (error) {
                    error.textContent = data.errors[field][0];
                    error.classList.remove('hidden');
                }
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Error adding car. Please try again.', 'error');
    });
});

function createCarCard(car) {
    const card = document.createElement('div');
    card.className = 'car-card';
    card.dataset.model = car.model;
    
    card.innerHTML = `
        <img src="${car.image_url || '{{ asset("images/car-placeholder.jpg") }}'}" 
             alt="${car.brand} ${car.model}"
             class="car-image">
        <div class="car-content">
            <h3 class="car-title">${car.model}</h3>
            <p class="car-price">$${parseFloat(car.selling_price).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</p>
            <div class="car-meta">
                <i class="far fa-calendar-alt mr-2"></i>
                <span>Imported: ${new Date(car.import_date).toLocaleDateString('en-US', {month: 'short', day: 'numeric', year: 'numeric'})}</span>
            </div>
            <div class="mt-4 flex gap-2">
                <a href="/cars/${car.id}" class="btn-primary flex-1">
                    <i class="fas fa-eye mr-2"></i>View Details
                </a>
                <button onclick="deleteCar(${car.id})" class="btn-secondary">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    return card;
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg text-white ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} shadow-lg transition-all duration-300 transform translate-y-0`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.style.transform = 'translateY(100%)';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}
</script>
@endpush 