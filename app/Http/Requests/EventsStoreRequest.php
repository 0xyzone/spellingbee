<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo('create events');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'start_date'=> 'required',
            'end_date'=> '',
            'description'=> '',
            'logo'=> 'required',
            'banner'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'logo.size'=> 'Logo size milena! mila xito!'
        ];
    }
}
