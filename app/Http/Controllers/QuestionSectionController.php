<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionSectionRequest;
use App\Http\Requests\UpdateQuestionSectionRequest;
use App\Models\QuestionSection;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth;

class QuestionSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionSections = QuestionSection::all();
        $scores = [];

        foreach ($questionSections as $section) {
            $totalQuestions = $section->questions()->count();

            // Get the latest answers for the user in this section
            $latestAnswers = UserAnswer::whereIn('question_id', $section->questions->pluck('id'))
                ->where('user_id', Auth::id())
                ->orderBy('created_at', 'desc') // Ensure the latest answers are retrieved
                ->get()
                ->unique('question_id'); // Only keep the latest answer for each question

            // Calculate the number of correct answers
            $correctAnswers = $latestAnswers->filter(function ($answer) {
                return $answer->is_correct;
            })->count();

            // Store the score as "correct/total"
            $scores[$section->id] = "{$correctAnswers}/{$totalQuestions}";
        }

        if (Auth::check() && Auth::user()->role === "admin") {
            return view("questionSections.index", ["questionSections" => $questionSections]);
        } else {
            return view("userQuestionSections.index", ["questionSections" => $questionSections, "scores" => $scores]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("questionSections.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionSectionRequest $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "description" => "required|min:10|max:300",
            "created_by" => "required",
        ]);

        QuestionSection::create($validatedData);

        return redirect("/")->with(["success" => "Section Created Successfully!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionSection $questionSection)
    {
        if (Auth::check() && Auth::user()->role === "admin") {
            return view("questionSections.show", ["questionSection" => $questionSection, "questions" => $questionSection->questions]);
        } else {
            return view("userQuestionSections.show", ["questionSection" => $questionSection, "questions" => $questionSection->questions]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionSection $questionSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionSectionRequest $request, QuestionSection $questionSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionSection $questionSection)
    {
        //
    }
}
