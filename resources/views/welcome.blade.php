@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to BookShelf</h1>
        <p class="text-xl text-gray-600">A place to manage your authors and books collection</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
        <div class="bg-white p-8 shadow-md rounded-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Authors</h2>
            <p class="text-gray-600 mb-4">Manage all your favorite authors in one place. Add their details and see all their published books.</p>
            <a href="{{ route('authors.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded inline-block">
                View Authors
            </a>
        </div>
        
        <div class="bg-white p-8 shadow-md rounded-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Books</h2>
            <p class="text-gray-600 mb-4">Browse through your book collection, add new titles, and link them to their respective authors.</p>
            <a href="{{ route('books.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded inline-block">
                View Books
            </a>
        </div>
    </div>
    
    <div class="mt-12 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Need Help?</h2>
        <p class="text-gray-600">Use our chatbot to get quick information about authors and books!</p>
        <p class="text-gray-500 text-sm mt-2">Try asking: "How many authors are there?" or "List top 5 authors."</p>
    </div>
</div>
@endsection
