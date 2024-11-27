<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo('create schools');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required",
            "address" => "required",
            "contact_person_name" => "required",
            "contact_number" => "required",
            "email" => "required",
            "school_type" => "required",
        ];
    }
}
