@extends('layouts.app')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('books.index') }}" class="inline-flex items-center text-gray-600 hover:text-indigo-600 mb-4 transition duration-150 ease-in-out">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Books
        </a>
        <h1 class="text-3xl font-bold text-gray-800">{{ $book->title }}</h1>
    </div>
    <div class="flex space-x-2">
        <a href="{{ route('books.edit', $book) }}" class="inline-flex items-center px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded-md shadow-sm transition">
            <i class="fas fa-edit mr-2"></i>
            Edit
        </a>
        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md shadow-sm transition" 
                    onclick="return confirm('Are you sure you want to delete this book?')">
                <i class="fas fa-trash mr-2"></i>
                Delete
            </button>
        </form>
    </div>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
    <div class="md:flex">
        <!-- Left column with book cover or placeholder -->
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 p-6 flex items-center justify-center md:w-1/3">
            <div class="w-48 h-64 bg-white shadow-md rounded-md flex items-center justify-center text-gray-400 border border-gray-200">
                <i class="fas fa-book text-5xl"></i>
            </div>
        </div>
        
        <!-- Right column with book details -->
        <div class="p-6 md:w-2/3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2 border-gray-200">Book Details</h2>
                    
                    <div class="space-y-2">
                        <div class="flex">
                            <span class="text-gray-600 font-medium w-32">Author:</span>
                            <a href="{{ route('authors.show', $book->author) }}" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                <i class="fas fa-user mr-2 text-gray-400"></i>
                                {{ $book->author->name }}
                            </a>
                        </div>
                        
                        <div class="flex">
                            <span class="text-gray-600 font-medium w-32">ISBN:</span>
                            <span class="text-gray-800">{{ $book->isbn }}</span>
                        </div>
                        
                        <div class="flex">
                            <span class="text-gray-600 font-medium w-32">Published:</span>
                            <span class="text-gray-800">{{ $book->published_year }}</span>
                        </div>
                        
                        <div class="flex">
                            <span class="text-gray-600 font-medium w-32">Added on:</span>
                            <span class="text-gray-800">{{ $book->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2 border-gray-200">Description</h2>
                    <p class="text-gray-700">{{ $book->description ?? 'No description available.' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
