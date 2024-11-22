<?php

namespace App\Http\GameManagement\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'member_id' => ['nullable'],
            'game_id' => ['required'],
            'start' => ['nullable'],
            'end' => ['nullable'],
        ];

        return $rules;
    }
}
