<nav class="bg-white border-b border-gray-100 shadow-sm">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-gray-800">BookShelf</h1>
                <div class="ml-10 space-x-4">
                    <a href="{{ route('authors.index') }}" class="text-gray-600 hover:text-gray-900">Authors</a>
                    <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-gray-900">Books</a>
                </div>
            </div>
        </div>
    </div>
</nav>
