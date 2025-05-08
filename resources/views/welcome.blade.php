@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">Welcome to <span class="text-indigo-600">BookShelf</span></h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">A modern place to manage your authors and books collection</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
        <div class="bg-white p-8 shadow-lg rounded-xl border border-gray-100 hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="bg-indigo-100 p-3 rounded-full">
                    <i class="fas fa-users text-indigo-600 text-xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 ml-4">Authors</h2>
            </div>
            <p class="text-gray-600 mb-6">Manage all your favorite authors in one place. Add their details and see all their published books.</p>
            <a href="{{ route('authors.index') }}" class="inline-flex items-center px-5 py-2.5 rounded-lg bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition shadow-sm">
                <span>View Authors</span>
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        
        <div class="bg-white p-8 shadow-lg rounded-xl border border-gray-100 hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
            <div class="flex items-center mb-4">
                <div class="bg-indigo-100 p-3 rounded-full">
                    <i class="fas fa-book text-indigo-600 text-xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 ml-4">Books</h2>
            </div>
            <p class="text-gray-600 mb-6">Browse through your book collection, add new titles, and link them to their respective authors.</p>
            <a href="{{ route('books.index') }}" class="inline-flex items-center px-5 py-2.5 rounded-lg bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition shadow-sm">
                <span>View Books</span>
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
    
    <div class="mt-16 text-center bg-gradient-to-r from-indigo-50 to-purple-50 py-10 px-4 rounded-2xl max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Need Help?</h2>
        <p class="text-gray-600 mb-3">Use our chatbot to get quick information about authors and books!</p>
        <p class="text-gray-500 text-sm mb-4">Try asking: "How many authors are there?" or "List top 5 authors."</p>
        <button onclick="document.querySelector('#chatbot > button:last-child').click()" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50 transition shadow-sm">
            <i class="fas fa-comment-dots mr-2 text-indigo-500"></i>
            Open Chat
        </button>
    </div>
</div>
@endsection
