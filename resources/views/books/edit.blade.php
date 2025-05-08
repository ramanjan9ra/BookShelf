@extends('layouts.app')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Edit Book</h1>
</div>

<div class="bg-white shadow-md rounded-md p-6">
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" 
                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="author_id" class="block text-gray-700 font-medium mb-2">Author</label>
            <select name="author_id" id="author_id" 
                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('author_id') border-red-500 @enderror">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
            @error('author_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="isbn" class="block text-gray-700 font-medium mb-2">ISBN</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}" 
                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('isbn') border-red-500 @enderror">
            @error('isbn')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="published_year" class="block text-gray-700 font-medium mb-2">Published Year</label>
            <input type="number" name="published_year" id="published_year" value="{{ old('published_year', $book->published_year) }}" 
                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('published_year') border-red-500 @enderror">
            @error('published_year')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="4" 
                     class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('description') border-red-500 @enderror">{{ old('description', $book->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex justify-end">
            <a href="{{ route('books.show', $book) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Update Book
            </button>
        </div>
    </form>
</div>
@endsection
