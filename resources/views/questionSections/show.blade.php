<x-layout :sectionHeader="$questionSection->name">
    @if ($questions->isEmpty())
        <div class="h-50 w-full flex items-end justify-center text-gray-500">
            <p class="text-center max-w-lg">
                There are no questions yet,
                @auth
                    please <br />
                    <a href="/create_question" class="text-gray-800 underline">Create Questions here</a>!
                @endauth
                @guest
                    please
                    <a href="/login" class="text-gray-800 underline">Login</a> using an admin account to create
                    questions or contact admins!
                @endguest
            </p>
        </div>
    @else
        <div class="bg-gray-100 py-8">
            <div class="flex flex-col gap-12">

                <!-- Main Content -->
                @foreach ($questions as $index => $question)
                    <div class="w-full bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Question {{ $index + 1 }} of
                            {{ $questions->count() }}</h2>
                        <p class="text-gray-700 mb-6">
                            {{ $question->question_text }}
                        </p>

                        <ul class="space-y-4">
                            @foreach ($question->answers as $index => $answer)
                                <li>
                                    <button
                                        class="w-full text-left py-3 px-4 rounded-md hover:text-indigo-600 cursor-pointer {{ $answer->is_correct ? 'bg-green-300 hover:bg-green-200' : 'bg-gray-100 hover:bg-indigo-100' }} ">
                                        {{ $answer->answer_text }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</x-layout>
