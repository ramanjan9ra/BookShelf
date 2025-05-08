<nav class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ url('/') ?? '/' }}" class="flex items-center">
                    <i class="fas fa-book-open text-indigo-600 text-2xl mr-3"></i>
                    <h1 class="text-2xl font-bold text-gray-800 tracking-tight">BookShelf</h1>
                </a>
                <div class="ml-10 space-x-6 hidden md:flex">
                    <a href="{{ route('authors.index') }}" class="text-gray-600 hover:text-indigo-600 font-medium transition duration-150 ease-in-out border-b-2 border-transparent hover:border-indigo-600 py-1">
                        <i class="fas fa-users mr-1"></i> Authors
                    </a>
                    <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-indigo-600 font-medium transition duration-150 ease-in-out border-b-2 border-transparent hover:border-indigo-600 py-1">
                        <i class="fas fa-book mr-1"></i> Books
                    </a>
                </div>
            </div>
            <div class="md:hidden">
                <button x-data="{}" x-on:click="document.querySelector('#mobile-menu').classList.toggle('hidden')" class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('authors.index') }}" class="text-gray-600 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-users mr-1"></i> Authors
            </a>
            <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">
                <i class="fas fa-book mr-1"></i> Books
            </a>
        </div>
    </div>
</nav>
