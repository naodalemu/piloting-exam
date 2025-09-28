{{-- filepath: /home/naod/training_dev/airline-prep/resources/views/auth/register.blade.php --}}
<x-layout sectionHeader="Create an Account">
    <div class="max-w-md mx-auto border-2 border-gray-800 rounded-lg p-6 mt-8">
        <form action="/register" method="POST" class="space-y-4">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full rounded-md border-gray-300 border-1 focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2"
                    placeholder="Enter your full name" value="{{ old('name') }}">
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email"
                    class="mt-1 block w-full rounded-md border-gray-300 border-1 focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2"
                    placeholder="Enter your email" value="{{ old('email') }}">
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select type="role" name="role" id="role"
                    class="mt-1 block w-full rounded-md border-gray-300 border-1 focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2"
                    placeholder="Enter your role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full rounded-md border-gray-300 border-1 focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2"
                    placeholder="Enter your password">
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 block w-full rounded-md border-gray-300 border-1 focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2"
                    placeholder="Confirm your password">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md font-semibold hover:bg-indigo-500">
                    Register
                </button>
            </div>
        </form>
    </div>
</x-layout>
