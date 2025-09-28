<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionSection;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("questions.index", ["questions" => Question::paginate(5), "questionSections" =>  QuestionSection::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questionSections = QuestionSection::all();
        return view("questions.create", ["questionSections" => $questionSections]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        
        $validatedData = $request->validate([
            "question_text" => "required|string",
            "question_section_id" => "required|exists:question_sections,id",
            "answers" => "required|array|min:1",
            "answers.*.answer_text" => "required|string",
            "answers.*.is_correct" => "required|boolean",
        ]);

        $question = Question::create([
            "question_text" => $validatedData["question_text"],
            "question_section_id" => $validatedData["question_section_id"],
            "created_by" => Auth::user()->id
        ]);

        foreach ($validatedData["answers"] as $answerData) {
            $question->answers()->create($answerData);
        }

        return redirect("/questions")->with(["success" => "Question Created Successfully!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view("questions.show", ["question" => $question, "answers" => $question->answers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
