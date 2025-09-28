<x-layout sectionHeader="Question Sections">
    @if ($questionSections->isEmpty())
        <div class="h-50 w-full flex items-end justify-center text-gray-500">
            <p class="text-center max-w-lg">
                There are no sections yet,
                @auth
                    please <br />
                    <a href="/create_question_section" class="text-gray-800 underline">Create Question Sections here</a>!
                @endauth
                @guest
                    please
                    <a href="/login" class="text-gray-800 underline">Login</a> using an admin account to create
                    question sections or contact admins!
                @endguest
            </p>
        </div>
    @else
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
    @endif
</x-layout>
