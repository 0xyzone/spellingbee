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
            'address' => 'required',
            'start_date'=> 'required',
            'end_date'=> '',
            'description'=> '',
            'logo'=> 'image|dimensions:width=1000,height=1000',
            'banner'=> 'image|dimensions:width=1920,height=1080'
        ];
    }

    public function messages()
    {
        return [
            'logo.size'=> 'Logo size milena! mila xito!',
            'logo.dimensions'=> '1000px x 1000px ko hunu paryo hai!',
            'banner.dimensions'=> '1920px x 1080px ko hunu paryo hai!'
        ];
    }
}
