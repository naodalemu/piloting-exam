<x-layout sectionHeader="Question Sections">
    <div class="bg-gray-100 py-4">
        <ul class="space-y-4">
            @foreach ($questionSections as $section)
                <a href="questions/{{ $section->id }}" class="p-6 bg-white shadow-md rounded-lg block">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $section->name }}</h2>
                    <p class="text-gray-600 mt-2">{{ $section->description }}</p>
                </a>
            @endforeach
        </ul>
    </div>
</x-layout>
