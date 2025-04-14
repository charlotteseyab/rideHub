@extends('layouts.app')

@section('title', 'RideHub - Your Ultimate Car Destination')

@section('content')
    <!-- Hero Section -->
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
            <span class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="text-white">
                        <h1 class="text-5xl font-semibold leading-tight mb-4">Discover Your Perfect Drive</h1>
                        <p class="text-xl leading-relaxed mt-4 mb-8">Experience luxury, performance, and comfort with our premium selection of vehicles. Your journey to the perfect car starts here.</p>
                        <a href="#featured-cars" class="bg-blue-600 text-white font-bold px-8 py-4 rounded-full hover:bg-blue-700 transition duration-300 ease-in-out inline-block">
                            Explore Our Collection
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
    </div>

    <!-- Featured Cars Section -->
    <section id="featured-cars" class="py-20 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-semibold text-center mb-12 dark:text-white">Featured Cars</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Featured Car 1 -->
                <div class="group bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-1 transition duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Luxury Car" class="w-full h-64 object-cover">
                        <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm">New Arrival</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 dark:text-white">2024 Mercedes-Benz S-Class</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Luxury redefined with cutting-edge technology and supreme comfort.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-blue-600">$89,900</span>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Featured Car 2 -->
                <div class="group bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-1 transition duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Sports Car" class="w-full h-64 object-cover">
                        <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm">Hot Deal</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 dark:text-white">2024 Porsche 911 GT3</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Pure performance meets precision engineering.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-blue-600">$162,450</span>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Featured Car 3 -->
                <div class="group bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-1 transition duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1560958089-b8a1929cea89?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Electric Car" class="w-full h-64 object-cover">
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm">Eco-Friendly</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 dark:text-white">2024 Tesla Model S Plaid</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Revolutionary electric performance with cutting-edge technology.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-blue-600">$129,990</span>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-semibold text-center mb-12 dark:text-white">Browse by Category</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Luxury Category -->
                <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Luxury Cars" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-75"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-white text-xl font-semibold mb-2">Luxury</h3>
                        <p class="text-gray-200 text-sm">Experience ultimate comfort and style</p>
                    </div>
                                </div>

                <!-- Sports Category -->
                <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1611821064430-0d40291d0f0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Sports Cars" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-75"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-white text-xl font-semibold mb-2">Sports</h3>
                        <p class="text-gray-200 text-sm">Feel the thrill of performance</p>
                    </div>
                                        </div>

                <!-- SUV Category -->
                <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="SUVs" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-75"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-white text-xl font-semibold mb-2">SUVs</h3>
                        <p class="text-gray-200 text-sm">Perfect for family adventures</p>
                                        </div>
                                    </div>

                <!-- Electric Category -->
                <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1560958089-b8a1929cea89?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Electric Cars" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-75"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-white text-xl font-semibold mb-2">Electric</h3>
                        <p class="text-gray-200 text-sm">Sustainable and powerful</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="why-choose-us" class="py-20 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-semibold text-center mb-12 dark:text-white">Why Choose RideHub</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-700 rounded-lg p-8 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-car text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 dark:text-white">Premium Selection</h3>
                    <p class="text-gray-600 dark:text-gray-300">Carefully curated collection of the finest vehicles, ensuring quality and performance.</p>
                </div>

                <div class="bg-white dark:bg-gray-700 rounded-lg p-8 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-headset text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 dark:text-white">Expert Support</h3>
                    <p class="text-gray-600 dark:text-gray-300">Our team of automotive experts is here to help you make the perfect choice.</p>
                </div>

                <div class="bg-white dark:bg-gray-700 rounded-lg p-8 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-shield-alt text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 dark:text-white">Secure Transactions</h3>
                    <p class="text-gray-600 dark:text-gray-300">Safe and transparent booking process with secure payment options.</p>
                </div>
            </div>
                                </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-semibold text-center mb-12 dark:text-white">Get in Touch</h2>
            <div class="max-w-4xl mx-auto">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-2xl font-semibold mb-6 dark:text-white">Contact Information</h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-blue-600 text-xl w-8"></i>
                                    <span class="text-gray-600 dark:text-gray-300">123 Car Street, Auto City, AC 12345</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-blue-600 text-xl w-8"></i>
                                    <span class="text-gray-600 dark:text-gray-300">(555) 123-4567</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-blue-600 text-xl w-8"></i>
                                    <span class="text-gray-600 dark:text-gray-300">info@ridehub.com</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold mb-6 dark:text-white">Send us a Message</h3>
                            <form>
                                <div class="mb-4">
                                    <input type="text" placeholder="Your Name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                </div>
                                <div class="mb-4">
                                    <input type="email" placeholder="Your Email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                </div>
                                <div class="mb-4">
                                    <textarea rows="4" placeholder="Your Message" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                                </div>
                                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-blue-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-semibold text-white mb-8">Ready to Find Your Dream Car?</h2>
            <p class="text-xl text-white mb-8">Join thousands of satisfied customers who found their perfect ride with us.</p>
            <a href="#featured-cars" class="bg-white text-blue-600 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition duration-300 inline-block">
                Get Started Today
            </a>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .waves {
        position: relative;
        width: 100%;
        height: 15vh;
        margin-bottom: -7px;
        min-height: 100px;
        max-height: 150px;
    }
    .parallax > use {
        animation: move-forever 25s cubic-bezier(.55,.5,.45,.5) infinite;
    }
    .parallax > use:nth-child(1) {
        animation-delay: -2s;
        animation-duration: 7s;
    }
    .parallax > use:nth-child(2) {
        animation-delay: -3s;
        animation-duration: 10s;
    }
    .parallax > use:nth-child(3) {
        animation-delay: -4s;
        animation-duration: 13s;
    }
    .parallax > use:nth-child(4) {
        animation-delay: -5s;
        animation-duration: 20s;
    }
    @keyframes move-forever {
        0% {
            transform: translate3d(-90px,0,0);
        }
        100% { 
            transform: translate3d(85px,0,0);
        }
    }
</style>
@endpush
