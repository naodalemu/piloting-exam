<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $validatedData = $request->validate([
                'answers' => 'required|array', // Ensure 'answers' is an array
                'answers.*' => 'required|exists:answers,id', // Validate each answer ID
                'question_section_id' => 'required|exists:question_sections,id', // Validate the section ID
            ]);

            // Loop through the answers and save them
            foreach ($validatedData['answers'] as $questionId => $answerId) {
                UserAnswer::create([
                    'user_id' => auth()->id(), // Get the authenticated user ID
                    'question_id' => $questionId, // Use the key as the question ID
                    'answer_id' => $answerId, // Use the value as the answer ID
                    'is_correct' => Answer::find($answerId)->is_correct, // Check if the answer is correct
                ]);
            }

            // Return a success response
            return response()->json(['message' => 'Exam submitted successfully!', 'redirect_url' => '/exams']);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error submitting exam: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred during submission. Please try again.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAnswer $userAnswer)
    {
        // 
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
    public function update(Request $request, UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAnswer $userAnswer)
    {
        //
    }
}
