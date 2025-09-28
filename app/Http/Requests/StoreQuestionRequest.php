<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->role === "admin";
    }

    /**
     * Prepare the data for validation.
     *
     * This method is executed before the validation rules are checked.
     */

    protected function prepareForValidation(): void
    {
        $answers = $this->input('answers', []);

        foreach ($answers as $index => $answer) {
            $answers[$index]['is_correct'] = isset($answer['is_correct']) && $answer['is_correct'] === 'on';
        }

        $this->merge([
            'answers' => $answers,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $answers = $this->input("answers", []);

            $hasCorrectAnswer = collect($answers)->contains(fn($answer) => $answer['is_correct'] === true);
            $hasText = collect($answers)->contains(fn($answer) => $answer['answer_text']);

            if (!$hasCorrectAnswer) {
                $validator->errors()->add('answers', 'At least one answer must be marked as correct.');
            }
            if (!$hasText) {
                $validator->errors()->add('answer_texts', 'At least one answer must written.');
            }
        });
    }
}
