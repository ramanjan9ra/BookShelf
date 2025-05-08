<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BookShelf</title>
    <meta name="description" content="Default description">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <div class="flex flex-col min-h-screen">
        @Include('components.navbar')

        <main class="flex-grow container mx-auto px-4 py-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            
            @yield('content')
        </main>
        
        @Include('components.footer')
    </div>
    
    @Include('components.chatbot')
    
    @stack('scripts')
</body>

</html>
