<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question' => ['required', 'array'],
            'question.en' => ['required', 'string', 'max:255'],
            'question.ar' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'array'],
            'answer.en' => ['required', 'string'],
            'answer.ar' => ['required', 'string'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ];
    }
}
