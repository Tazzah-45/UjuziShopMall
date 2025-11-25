    {{-- Footer --}}
    <footer class="bg-gray-800 text-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto py-12 px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- About --}}
            <div>
                <h3 class="text-lg font-bold mb-4">About Ujuzi Shop Mall</h3>
                <p>Ujuzi Shop Mall is a simple inventory management system designed to help stores manage products, stock, and analytics efficiently.</p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                <ul>
                    <li><a href="{{ route('welcome') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-white">Products</a></li>
                    <li><a href="{{ route('dashboard') }}" class="hover:text-white">Dashboard</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                <p>Email: support@ujuzishopmall.com</p>
                <p>Phone: +256 700 000 000</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="hover:text-white"> <!-- Twitter icon -->
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">...</svg>
                    </a>
                    <a href="#" class="hover:text-white"> <!-- Facebook icon -->
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">...</svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 py-4 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} Ujuzi Shop Mall. All rights reserved.
        </div>
    </footer>