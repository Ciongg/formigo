<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
    <nav class="flex items-center justify-between p-4 border-b">
        @guest
            <div class="flex items-center space-x-4">
                <a href="/" class="text-xl font-bold text-blue-500">FORMIGO</a>
                <a href="/feed" class="text-gray-600 hover:text-blue-500">Home</a>
                <a href="#" class="text-gray-600 hover:text-blue-500">About</a>
                <a href="#" class="text-gray-600 hover:text-blue-500">Rewards</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="border px-4 py-1 rounded text-gray-600 hover:border-blue-500 hover:text-blue-500">
                    Login
                </a>
                <a href="{{ route('register') }}" class="border px-4 py-1 rounded text-gray-600 hover:border-blue-500 hover:text-blue-500">
                    Register
                </a>
            </div>
        @endguest
            
        @auth
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center space-x-4">
                <a href="/" class="text-xl font-bold text-blue-500">FORMIGO</a>
                <a href="/feed" class="text-gray-600 hover:text-blue-500">Feed</a>
                <a href="#" class="text-gray-600 hover:text-blue-500">Create Survey</a>
                <a href="#" class="text-gray-600 hover:text-blue-500">Redeem</a>
            </div>

            <div class="flex items-center space-x-4">
                
                <form action="/logout" method="POST" >
                    @csrf
                    <div class="flex gap-8 items-center">
                        
                        <button type="submit" class="cursor-pointer hover:underline text-gray">logout</button>
                        <span class="text-gray-700 font-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center text-white">
                        <!-- Profile Icon -->
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </form>
                <!-- User Info -->
            </div>
        </div>
        @endauth
    </nav>

    <div>
        {{ $slot }}
    </div>
</body>
</html>
