@extends('layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('books.index') }}" class="inline-flex items-center text-gray-600 hover:text-indigo-600 mb-4 transition duration-150 ease-in-out">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Books
    </a>
    <h1 class="text-3xl font-bold text-gray-800">Add New Book</h1>
</div>

<div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200 transition-all duration-300 hover:shadow-xl">
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-book text-gray-400"></i>
                        </div>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" 
                             class="w-full pl-10 pr-3 py-2.5 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-200 @error('title') border-red-300 @enderror"
                             placeholder="Enter book title">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="author_id" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user-edit text-gray-400"></i>
                        </div>
                        <select name="author_id" id="author_id" 
                           class="w-full pl-10 pr-3 py-2.5 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-200 @error('author_id') border-red-300 @enderror">
                            <option value="">Select an author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('author_id')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">ISBN</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-barcode text-gray-400"></i>
                        </div>
                        <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" 
                             class="w-full pl-10 pr-3 py-2.5 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-200 @error('isbn') border-red-300 @enderror"
                             placeholder="Enter ISBN number">
                        @error('isbn')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="published_year" class="block text-sm font-medium text-gray-700 mb-1">Published Year</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-calendar-alt text-gray-400"></i>
                        </div>
                        <input type="number" name="published_year" id="published_year" value="{{ old('published_year') }}" 
                             class="w-full pl-10 pr-3 py-2.5 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-200 @error('published_year') border-red-300 @enderror"
                             placeholder="Enter publication year">
                        @error('published_year')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                        <i class="fas fa-align-left text-gray-400"></i>
                    </div>
                    <textarea name="description" id="description" rows="12"
                         class="w-full pl-10 pr-3 py-2.5 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-200 @error('description') border-red-300 @enderror"
                         placeholder="Enter book description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
            <a href="{{ route('books.index') }}" class="bg-white py-2.5 px-5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200 mr-4 flex items-center">
                <i class="fas fa-times mr-2"></i>
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center py-2.5 px-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:-translate-y-0.5">
                <i class="fas fa-plus mr-2"></i>
                Create Book
            </button>
        </div>
    </form>
</div>
@endsection
