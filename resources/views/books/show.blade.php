@extends('layouts.app')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">{{ $book->title }}</h1>
    <div class="space-x-2">
        <a href="{{ route('books.edit', $book) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
            Edit
        </a>
        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded" 
                    onclick="return confirm('Are you sure you want to delete this book?')">
                Delete
            </button>
        </form>
    </div>
</div>

<div class="bg-white shadow-md rounded-md p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Book Details</h2>
            <p class="text-gray-600"><strong>Author:</strong> 
                <a href="{{ route('authors.show', $book->author) }}" class="text-blue-600 hover:text-blue-900">
                    {{ $book->author->name }}
                </a>
            </p>
            <p class="text-gray-600"><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p class="text-gray-600"><strong>Published Year:</strong> {{ $book->published_year }}</p>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Description</h2>
            <p class="text-gray-700">{{ $book->description ?? 'No description available.' }}</p>
        </div>
    </div>
</div>

<div class="mt-6">
    <a href="{{ route('books.index') }}" class="text-blue-600 hover:text-blue-900">
        &larr; Back to Books
    </a>
</div>
@endsection
