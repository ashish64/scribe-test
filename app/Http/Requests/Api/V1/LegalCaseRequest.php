<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class LegalCaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'status' => 'required|string',
            'title' => 'required|string',
            'description' => 'string',
            'employee_id' => 'required|int',
            'advisor_id' => 'required|int',
            'reference_id' => 'required|int',
            'address' => 'int',
            'metadata' => 'json',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            //
            'id' => [
                'description' => 'Id of the legal case.',
            ],
            'user_id' => [
                'description' => 'Related ser id for the legal case.',
            ],
            'status' => [
                'description' => 'status of the legal case'
            ],
            'title' => [
                'description' => 'title of the legal case'
            ],
            'description' => [
                'description' => 'description of the legal case'
            ],
            'employee_id' => [
                'description' => 'related employee_id for the legal case'
            ],
            'advisor_id' => [
                'description' => 'related advisor_id for the legal case'
            ],
            'reference_id' => [
                'description' => 'related reference_id for the legal case'
            ],
            'address' => [
                'description' => 'address of the legal case'
            ],
            'metadata' => [
                'description' => 'metadata of the legal case'
            ],
        ];
    }
}
