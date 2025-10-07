{{-- filepath: /home/naod/training_dev/airline-prep/resources/views/userQuestionSections/index.blade.php --}}
<x-layout sectionHeader="Exams">
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
        <div class="bg-gray-100 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($questionSections as $section)
                    <a href="questions/{{ $section->id }}"
                        class="p-6 bg-white shadow-md rounded-lg hover:shadow-lg transition-shadow">
                        <p class="text-indigo-600 my-4 font-semibold">Score: {{ $scores[$section->id] }}</p>
                        <h2 class="text-lg font-semibold text-gray-900">{{ $section->name }}</h2>
                        <p class="text-gray-600 mt-2">{{ $section->description }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</x-layout>
