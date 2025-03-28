<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-blue-50 p-6">
        <div class="flex flex-col items-center gap-6 text-center">
            <!-- Formigo Branding -->
            <h1 class="text-4xl font-bold text-blue-600">Register</h1>
            <p class="text-lg text-gray-700">Together, We Empower Research!</p>

            <form action="/register" method="POST" class="bg-white shadow-lg rounded-lg p-8 w-[80vh]">
                @csrf
                <div class="flex flex-col gap-6">
                    <!-- First Name -->
                    <div class="text-left">
                        <label for="first_name" class="text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="first_name" id="first_name"
                               class="block w-full mt-1 py-2 px-4 border rounded-md bg-gray-100 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                               required>
                        <x-form-error name="first_name"></x-form-error>
                    </div>

                    <!-- Last Name -->
                    <div class="text-left">
                        <label for="last_name" class="text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" name="last_name" id="last_name"
                               class="block w-full mt-1 py-2 px-4 border rounded-md bg-gray-100 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                               required>
                        <x-form-error name="last_name"></x-form-error>
                    </div>

                 
                    <!-- Email -->
                    <div class="text-left">
                        <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email"
                               class="block w-full mt-1 py-2 px-4 border rounded-md bg-gray-100 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                               required>
                        <x-form-error name="email"></x-form-error>
                    </div>

                    <!-- Contact Number -->
                    <div class="text-left">
                        <label for="contact_number" class="text-sm font-medium text-gray-700">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number"
                            class="block w-full mt-1 py-2 px-4 border rounded-md bg-gray-100 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            required>
                        <x-form-error name="contact_number"></x-form-error>
                    </div>


                    <!-- Password -->
                    <div class="text-left">
                        <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                               class="block w-full mt-1 py-2 px-4 border rounded-md bg-gray-100 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                               required>
                        <x-form-error name="password"></x-form-error>
                    </div>

                    <!-- Confirm Password -->
                    <div class="text-left">
                        <label for="password_confirmation" class="text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="block w-full mt-1 py-2 px-4 border rounded-md bg-gray-100 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                               required>
                        <x-form-error name="password_confirmation"></x-form-error>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" 
                            class="w-full py-2 text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 font-semibold transition-all">
                        Register
                    </button>

                    <!-- Login Link -->
                    <p class="text-sm text-gray-600">Already have an account? 
                        <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:underline">Login here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-layout>
