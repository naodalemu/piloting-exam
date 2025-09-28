<x-layout :sectionHeader="$questionSection->name">
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
                                    class="w-full text-left bg-gray-100 py-3 px-4 rounded-md hover:bg-indigo-100 hover:text-indigo-600 cursor-pointer">
                                    {{ $answer->answer_text }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
