<?php

namespace App\Http\Requests\CompanySetup;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        return [
            'name' => ['nullable', 'string', 'max:25'],
            'tagline' => ['nullable', 'string', 'max:25'],
            'description' => ['nullable', 'string', 'max:250'],
            'estd_date' => ['nullable', 'date'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:25'],
            'hotline' => ['nullable', 'string', 'max:15'],
            'logo' => ['nullable', 'image', 'max:1024'],
            'favicon' => ['nullable', 'image', 'max:512'],
            'screenshot' => ['nullable', 'image', 'max:2048'],
            'social_media' => ['nullable', 'array'],
            'social_media.*' => ['nullable', 'url'], 
        ];

        // if ($this->isMethod('post')) {
        //     $rules['slug'][] = 'unique:roles,slug';
        // }

        // if ($this->isMethod('put') || $this->isMethod('patch')) {
        //     $roleId = $this->route('role')->id ?? null;
        //     $rules['slug'][] = 'unique:roles,slug,' . $roleId;
        // }
        return $rules;
    }
}
