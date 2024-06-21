<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            //
                'name' => 'required|string|max:255'
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Users name',
            ],
            'email' => [
                'description' => 'Email address'
            ],
            'emailVerifiedAt' => [
                'description' => 'verified at date'
            ],
            'createdAt' => [
                'description' => 'created date'
            ],
            'updatedAt' => [
                'description' => 'updated date'
            ]
        ];
    }
}
