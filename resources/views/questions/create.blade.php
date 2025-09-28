<x-layout sectionHeader="Create a New Question">
    <div class="flex flex-col">
        <form action="/create_question" method="POST">
            @csrf

            <div class="mb-4">
                <label for="question_section_id" class="block text-sm font-medium text-gray-700">Question Section</label>
                <select name="question_section_id" id="question_section_id"
                    class="mt-1 block w-full rounded-md border-2 border-gray-500 focus:border-gray-900 px-3 py-2">
                    @foreach ($questionSections as $questionSection)
                        <option value="{{ $questionSection->id }}">{{ $questionSection->name }}</option>
                    @endforeach
                </select>
                @error('question_section_id')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Question Text -->
            <div class="mb-4">
                <label for="question_text" class="block text-sm font-medium text-gray-700">Question Text</label>
                <textarea name="question_text" id="question_text" rows="4"
                    class="mt-1 block w-full rounded-md border-2 border-gray-500 focus:border-gray-900 px-3 py-2"
                    placeholder="Question Text">{{ old('question_text') }}</textarea>
                @error('question_text')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Answers -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Answers</label>
                <div id="answers-container">
                    <div class="flex items-center mb-2">
                        <input type="text" name="answers[0][answer_text]" placeholder="Answer Text"
                            class="flex-1 rounded-md border-2 border-gray-500 focus:border-gray-900 px-3 py-2"
                            value="{{ old('answer_text') }}">
                        <input type="checkbox" name="answers[0][is_correct]" class="ml-4">
                        <span class="ml-2 text-sm text-gray-700">Correct</span>
                    </div>
                    @error('answers[0][answer_text]')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    @error('answers[0][is_correct]')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="button" id="add-answer"
                    class="mt-2 bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-500">Add Answer</button>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md font-semibold hover:bg-indigo-500">Create
                    Question</button>
            </div>
        </form>
    </div>

    <script>
        let answerIndex = 1;
        document.getElementById('add-answer').addEventListener('click', function() {
            const container = document.getElementById('answers-container');
            const newAnswer = document.createElement('div');
            newAnswer.className = 'flex items-center mb-2';
            newAnswer.innerHTML = `
                <input type="text" name="answers[${answerIndex}][answer_text]" placeholder="Answer Text" class="flex-1 rounded-md border-2 border-gray-500 focus:border-gray-900 px-3 py-2">
                <input type="checkbox" name="answers[${answerIndex}][is_correct]" class="ml-4">
                <span class="ml-2 text-sm text-gray-700">Correct</span>
            `;
            container.appendChild(newAnswer);
            answerIndex++;
        });
    </script>
</x-layout>
