@extends('layouts.app')

@section('content')
<div class="mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="mb-4 md:mb-0">
            <h1 class="text-3xl font-bold text-gray-800 mb-1">Books</h1>
            <p class="text-gray-500">Manage and explore your book collection</p>
        </div>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" placeholder="Search books..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-purple-500 focus:border-purple-500">
        </div>
        <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg shadow-sm transition duration-150 ease-in-out">
            <i class="fas fa-plus mr-2"></i>
            Add New Book
        </a>
    </div>
</div>

<!-- Books Collection -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($books as $book)
    <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 relative">
        <div class="absolute top-0 right-0 mt-4 mr-4 z-10">
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-purple-100 text-purple-800 text-xs font-bold">
                {{ $book->id }}
            </span>
        </div>
        
        <div class="h-40 relative">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900 via-violet-800 to-indigo-900 opacity-90"></div>
            <div class="relative z-10 flex items-center justify-center h-full p-6">
                <h3 class="text-2xl font-bold text-white text-center leading-tight">{{ $book->title }}</h3>
            </div>
        </div>
        
        <div class="p-6">
            <div class="flex items-center mb-4">
                <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                    <i class="fas fa-user text-purple-500"></i>
                </div>
                <div>
                    <a href="{{ route('authors.show', $book->author) }}" class="text-gray-800 hover:text-purple-700 font-medium transition-colors">
                        {{ $book->author->name }}
                    </a>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-3 mb-5">
                <div class="bg-gray-50 rounded-lg p-3">
                    <div class="text-xs text-gray-500 mb-1">Published</div>
                    <div class="text-sm font-medium">{{ $book->published_year ?: 'Unknown' }}</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-3">
                    <div class="text-xs text-gray-500 mb-1">ISBN</div>
                    <div class="text-sm font-medium truncate">{{ $book->isbn ?: 'N/A' }}</div>
                </div>
            </div>
            
            <div class="border-t border-gray-100 pt-4 flex justify-between items-center">
                <a href="{{ route('books.show', $book) }}" class="text-purple-600 hover:text-purple-800 font-medium flex items-center group-hover:underline">
                    <span>Details</span>
                    <i class="fas fa-chevron-right ml-1.5 text-xs transition-transform group-hover:translate-x-1"></i>
                </a>
                
                <div class="flex space-x-2">
                    <a href="{{ route('books.edit', $book) }}" class="p-2 text-gray-600 hover:text-amber-600 hover:bg-amber-50 rounded-md transition-colors" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-md transition-colors" 
                                onclick="return confirm('Are you sure you want to delete this book?')" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Empty state -->
@if(count($books) === 0)
<div class="text-center py-16 px-4 bg-white rounded-xl border border-dashed border-gray-300">
    <div class="inline-block p-6 rounded-full bg-purple-50 text-purple-500 mb-4">
        <i class="fas fa-book-open text-3xl"></i>
    </div>
    <h3 class="text-xl font-medium text-gray-900 mb-2">Your bookshelf is empty</h3>
    <p class="text-gray-500 mb-6 max-w-md mx-auto">Start building your collection by adding your first book.</p>
    <a href="{{ route('books.create') }}" class="inline-flex items-center px-5 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors">
        <i class="fas fa-plus mr-2"></i> Add Your First Book
    </a>
</div>
@endif

@if($books->hasPages())
<div class="mt-8 bg-white p-4 rounded-lg shadow-sm">
    {{ $books->links() }}
</div>
@endif
@endsection
