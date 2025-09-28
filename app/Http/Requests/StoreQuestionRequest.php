<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
}
