<?php

namespace App\Http\Requests\UserManagement;

use App\Enums\GlobalUsage\Status;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            $rules['slug'][] = 'unique:roles,slug';
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['slug'][] = 'unique:roles,slug,' . $this->route('role');
        }

        return $rules;
    }

    /**
     * Custom messages for validation errors (optional).
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'title.max' => 'The title cannot exceed 25 characters.',
            'slug.required' => 'The slug is required.',
            'slug.unique' => 'The slug must be unique.',
            'status.required' => 'The status is required.',
            'status.in' => 'The status must be a valid value: ' . implode(', ', Status::fetch()) . '.',
        ];
    }
}
