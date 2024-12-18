<?php

namespace App\Http\Requests\UserManagement;

use App\Enums\UserManagement\Approval;
use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['nullable', 'string', 'max:50'],
            'username' => ['nullable', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'string', 'max:19'],
            'status' => ['nullable', 'in:' . implode(',', Approval::fetch())],
        ];

        if ($this->isMethod('post')) {
            $rules['email'][] = 'unique:members,email';
            $rules['phone'][] = 'unique:members,phone';
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $memberId = $this->route('member')->id ?? null;
            $rules['email'][] = 'unique:members,email,' . $memberId;
            $rules['phone'][] = 'unique:members,phone,' . $memberId;
            $rules['password'] = ['nullable', 'string', 'min:8'];
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'firstname.required' => 'The first name field is required.',
            'firstname.string' => 'The first name must be a valid string.',
            'firstname.max' => 'The first name may not be greater than 50 characters.',
            'lastname.string' => 'The last name must be a valid string.',
            'lastname.max' => 'The last name may not be greater than 50 characters.',
            'email.required' => 'The email field is required.',
            'email.string' => 'The email must be a valid string.',
            'email.max' => 'The email may not be greater than 100 characters.',
            'email.unique' => 'This email has already been taken.',
            'phone.required' => 'The phone field is required.',
            'phone.string' => 'The phone must be a valid string.',
            'phone.max' => 'The phone number may not be greater than 19 characters.',
            'phone.unique' => 'This phone number has already been taken.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a valid string.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'status.in' => 'The status is not valid.',
        ];
    }
}
