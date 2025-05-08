@extends('layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('authors.show', $author) }}" class="inline-flex items-center text-gray-600 hover:text-indigo-600 mb-4 transition duration-150 ease-in-out">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Author
    </a>
    <h1 class="text-3xl font-bold text-gray-800">Edit Author</h1>
</div>

<div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200 transition-all duration-300 hover:shadow-xl">
    <form action="{{ route('authors.update', $author) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" 
                             class="w-full pl-10 pr-3 py-2.5 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-200 @error('name') border-red-300 @enderror"
                             placeholder="Enter author's name">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email', $author->email) }}" 
                             class="w-full pl-10 pr-3 py-2.5 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-200 @error('email') border-red-300 @enderror"
                             placeholder="author@example.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Biography</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                        <i class="fas fa-book text-gray-400"></i>
                    </div>
                    <textarea name="bio" id="bio" rows="8"
                         class="w-full pl-10 pr-3 py-2.5 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-200 @error('bio') border-red-300 @enderror"
                         placeholder="Enter author's biography">{{ old('bio', $author->bio) }}</textarea>
                    @error('bio')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
            <a href="{{ route('authors.show', $author) }}" class="bg-white py-2.5 px-5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200 mr-4 flex items-center">
                <i class="fas fa-times mr-2"></i>
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center py-2.5 px-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:-translate-y-0.5">
                <i class="fas fa-save mr-2"></i>
                Update Author
            </button>
        </div>
    </form>
</div>
@endsection
