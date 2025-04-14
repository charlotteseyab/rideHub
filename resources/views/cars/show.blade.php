@extends('layouts.app')

@section('title', 'View Car - RideHub')

@section('header', 'Car Details')

@section('content')
<div class="container mx-auto px-4 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('cars.' . $car->brand) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
            <i class="fas fa-arrow-left mr-2"></i>Back to {{ ucfirst($car->brand) }} Cars
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
        <div class="p-6">
            <!-- Car Image -->
            @if($car->image_url)
            <div class="mb-8">
                <img src="{{ $car->image_url }}" alt="{{ $car->brand }} {{ $car->model }}" class="w-full max-w-2xl mx-auto rounded-lg shadow-lg">
            </div>
            @endif

            <!-- Car Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Basic Information</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Brand</p>
                                <p class="text-gray-900 dark:text-white">{{ $car->brand }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Model</p>
                                <p class="text-gray-900 dark:text-white">{{ $car->model }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Import Date</p>
                                <p class="text-gray-900 dark:text-white">{{ $car->import_date->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Selling Price</p>
                                <p class="text-gray-900 dark:text-white">${{ number_format($car->selling_price, 2) }}</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Description</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ $car->description ?: 'No description available.' }}</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Additional Information</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Added On</p>
                                <p class="text-gray-900 dark:text-white">{{ $car->created_at->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</p>
                                <p class="text-gray-900 dark:text-white">{{ $car->updated_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit mr-2"></i>Edit Car
                </a>
                <button onclick="confirmDelete()" class="btn btn-danger">
                    <i class="fas fa-trash mr-2"></i>Delete Car
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal hidden">
    <div class="modal-overlay"></div>
    <div class="modal-content p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Deletion</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <p class="text-gray-600 dark:text-gray-300 mb-4">Are you sure you want to delete this car? This action cannot be undone.</p>
        <div class="flex justify-end space-x-3">
            <button onclick="closeModal()" class="btn btn-secondary">Cancel</button>
            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
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
    .btn-danger {
        @apply bg-red-600 text-white hover:bg-red-700 focus:ring-red-500;
    }
    .btn-secondary {
        @apply bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring-gray-500 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600;
    }
    .modal {
        @apply fixed inset-0 z-50 overflow-y-auto;
    }
    .modal-overlay {
        @apply fixed inset-0 bg-black bg-opacity-50;
    }
    .modal-content {
        @apply relative bg-white dark:bg-gray-800 rounded-lg mx-auto my-8 max-w-lg w-full shadow-xl;
    }
</style>
@endpush

@push('scripts')
<script>
function confirmDelete() {
    document.getElementById('deleteModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.querySelector('.modal-overlay').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});
</script>
@endpush 