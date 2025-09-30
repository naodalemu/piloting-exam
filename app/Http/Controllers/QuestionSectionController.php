<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionSectionRequest;
use App\Http\Requests\UpdateQuestionSectionRequest;
use App\Models\QuestionSection;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class QuestionSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("welcome", ["questionSections" => QuestionSection::all()]);
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
        foreach ($questionSection->questions as $index => $question) {
            foreach ($question->answers as $index => $answers) {
                
            }
        }

        // dd($questionSection->questions[0]->answers);
        return view("questionSections.index", ["questionSection" => $questionSection, "questions" => $questionSection->questions]);
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
