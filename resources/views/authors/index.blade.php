@extends('layouts.app')

@section('content')
<div class="mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="mb-4 md:mb-0">
            <h1 class="text-3xl font-bold text-gray-800 mb-1">Authors</h1>
            <p class="text-gray-500">Manage your favorite authors</p>
        </div>
        <a href="{{ route('authors.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition duration-150 ease-in-out">
            <i class="fas fa-plus mr-2"></i>
            Add New Author
        </a>
    </div>
</div>

<!-- Main Authors List -->
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
        <i class="fas fa-users text-indigo-600 mr-2"></i> All Authors
    </h2>
    <div class="relative w-64">
        <input type="text" id="authorSearch" class="w-full pl-9 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm" placeholder="Search authors...">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-search text-gray-400 text-sm"></i>
        </div>
    </div>
</div>

<div class="divide-y divide-gray-100">
    @foreach ($authors as $author)
    <div class="hover:bg-gray-50 transition-colors duration-150 ease-in-out rounded-lg p-4 border-l-4 border-indigo-500 bg-white mb-2 shadow-sm">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between">
            <div class="flex items-center mb-3 sm:mb-0 w-full">
                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-xl font-bold mr-4 shadow-sm">
                    {{ strtoupper(substr($author->name, 0, 1)) }}
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full">
                    <div class="flex items-center">
                        <h3 class="font-bold text-lg text-gray-900">{{ $author->name }}</h3>
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-envelope text-indigo-400 mr-2"></i>
                        <span>{{ $author->email }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-book text-indigo-500 mr-2"></i>
                        <span>{{ $author->books_count }} {{ Str::plural('Book', $author->books_count) }}</span>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center space-x-2">
                <a href="{{ route('authors.show', $author) }}" class="p-2 text-indigo-600 hover:text-indigo-800 hover:bg-indigo-50 rounded-full transition-colors" title="View">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('authors.edit', $author) }}" class="p-2 text-amber-600 hover:text-amber-800 hover:bg-amber-50 rounded-full transition-colors" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-full transition-colors" 
                            onclick="return confirm('Are you sure you want to delete this author?')" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Empty state -->
@if(count($authors) === 0)
<div class="text-center py-12 px-4 bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="inline-block p-6 rounded-full bg-indigo-50 text-indigo-500 mb-4">
        <i class="fas fa-users text-3xl"></i>
    </div>
    <h3 class="text-xl font-medium text-gray-900 mb-2">No authors found</h3>
    <p class="text-gray-500 mb-6 max-w-md mx-auto">Your author collection is empty. Add your first author to start building your library.</p>
    <a href="{{ route('authors.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors">
        <i class="fas fa-plus mr-2"></i> Add New Author
    </a>
</div>
@endif

@if($authors->hasPages())
<div class="mt-6">
    {{ $authors->links() }}
</div>
@endif

<style>
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
@endsection
