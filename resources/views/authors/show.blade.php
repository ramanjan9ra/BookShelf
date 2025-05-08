@extends('layouts.app')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">{{ $author->name }}</h1>
    <div class="space-x-2">
        <a href="{{ route('authors.edit', $author) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
            Edit
        </a>
        <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded" 
                    onclick="return confirm('Are you sure you want to delete this author?')">
                Delete
            </button>
        </form>
    </div>
</div>

<div class="bg-white shadow-md rounded-md p-6 mb-6">
    <div class="mb-4">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Author Details</h2>
        <p class="text-gray-600"><strong>Email:</strong> {{ $author->email }}</p>
        <p class="text-gray-600 mt-2"><strong>Biography:</strong></p>
        <p class="text-gray-700 mt-1">{{ $author->bio ?? 'No biography available.' }}</p>
    </div>
</div>

<div class="mb-4 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Books by {{ $author->name }}</h2>
    <a href="{{ route('books.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        Add New Book
    </a>
</div>

<div class="bg-white shadow-md rounded-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ISBN</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published Year</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($author->books as $book)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $book->title }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $book->isbn }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $book->published_year }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                        <a href="{{ route('books.show', $book) }}" class="text-blue-600 hover:text-blue-900">View</a>
                        <a href="{{ route('books.edit', $book) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" 
                                    onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No books found for this author.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    <a href="{{ route('authors.index') }}" class="text-blue-600 hover:text-blue-900">
        &larr; Back to Authors
    </a>
</div>
@endsection
