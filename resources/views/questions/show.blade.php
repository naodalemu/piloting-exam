<x-layout>
    <h1>{{ $question->question_text }}</h1>
    <ol class="list-inside">
        @foreach ($answers as $answer)
            <li>{{ $answer->answer_text }}</li>
        @endforeach
    </ol>
</x-layout>
