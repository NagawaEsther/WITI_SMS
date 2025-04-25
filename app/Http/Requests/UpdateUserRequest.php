<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function rules()
    // {
    //     $rules = User::$rules;
    //     $rules['phone_number_two'] = $rules['phone_number_two'].",".$this->route("user");
    //     return $rules;
    // }

    public function rules()
    {
        // Get existing rules from the User model
        $rules = User::$rules;

        // Exclude current user's email and phone number from uniqueness check
        $rules['email'] = [
            'required',
            'string',
            'email',
            Rule::unique('users')->ignore($this->route('user'))
        ];

        $rules['phone_number'] = [
            'required',
            'min:10',
            'max:10',
            Rule::unique('users')->ignore($this->route('user'))
        ];

        $rules['phone_number_two'] = [
            'nullable',
            'string',
            'min:10',
            'max:10',
            Rule::unique('users')->ignore($this->route('user'))
        ];

        return $rules;
    }
}
