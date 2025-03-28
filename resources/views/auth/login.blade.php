<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-blue-50 p-6">
        <div class="flex flex-col items-center gap-6 text-center">
            <!-- Formigo Branding -->
            <h1 class="text-4xl font-bold text-blue-600">Login</h1>
            <p class="text-lg text-gray-700">Together, We Empower Research!</p>

            <form action="/login" method="POST" class="bg-white shadow-lg rounded-lg p-8 w-[80vh]">
                @csrf
                <div class="flex flex-col gap-6">
                    <!-- Email Input -->
                    <div class="text-left">
                        <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" 
                               class="block w-full mt-1 py-2 px-4 border rounded-md bg-gray-100 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                               required>
                        <x-form-error name="email"></x-form-error>
                    </div>

                    <!-- Password Input -->
                    <div class="text-left">
                        <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" 
                               class="block w-full mt-1 py-2 px-4 border rounded-md bg-gray-100 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                               required>
                        <x-form-error name="password"></x-form-error>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" 
                            class="w-full py-2 text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 font-semibold transition-all">
                        Login
                    </button>

                    <!-- Register Link -->
                    <p class="text-sm text-gray-600">Don't have an account? 
                        <a href="{{ route('register') }}" class="text-blue-500 font-semibold hover:underline">Register here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-layout>
