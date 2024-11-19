<?php

namespace App\Http\Requests\GameManagement;

use App\Enums\GlobalUsage\Status;
use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:25'],
            'description' => ['nullable', 'string', 'max:250'],
            'slug' => ['required', 'string', 'max:25'],
            'status' => ['required', 'in:' . implode(',', Status::fetch())],
        ];

        if ($this->isMethod('post')) {
            // Unique rule for store operation
            $rules['slug'][] = 'unique:roles,slug';
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // Unique rule for update operation, excluding current record
            $roleId = $this->route('role')->id ?? null;
            $rules['slug'][] = 'unique:roles,slug,' . $roleId;
        }

        return $rules;
    }
}
