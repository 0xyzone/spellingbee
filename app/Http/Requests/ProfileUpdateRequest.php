<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['string', 'lowercase', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'date_of_birth' => ['required'],
            'contact_number' => ['required'],
            'address' => ['required'],
            'school' => ['required'],
            'school_address' => ['required'],
            'school_email' => ['required'],
            'school_number' => ['required'],
            'gender' => ['required'],
            'representative_name' => ['required'],
            'representative_number' => ['required'],
            'representative_relationship' => ['required'],
            'grade' => ['required'],
            'consent' => ['required']
        ];
    }
}
