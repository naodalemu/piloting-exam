<x-layout sectionHeader="Create a New Question Section">
    <div>
        <form action="/create_question_section" method="POST">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Question Section
                    Name</label>
                <input type="text" name="name" id="name" placeholder="SAT Maths..."
                    class="flex-1 w-xl mt-1 rounded-md border-2 border-gray-500 focus:border-gray-900 px-3 py-2" value="{{ old("name") }}" />
                @error("name")
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Question Section
                    Name</label>
                <textarea name="description" id="description" placeholder="The Mathematics part of the piloting exam..." rows="5"
                    class="flex-1 w-xl mt-1 rounded-md border-2 border-gray-500 focus:border-gray-900 px-3 py-2">{{ old("description") }}</textarea>
                @error("description")
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <input type="text" hidden value="{{ Auth::user()->id }}" name="created_by" />

            <div class="mt-6">
                <button type="submit"
                    class="bg-indigo-600 text-white py-2 px-4 rounded-md font-semibold hover:bg-indigo-500">Create
                    Question Section</button>
            </div>
        </form>
    </div>
</x-layout>
