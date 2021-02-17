<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules()
    {
        return [
            'academicid' => array('required', 'regex:/^\d{4}-\d{4}-[1-3]$/'),
            'firstname' => array('required', 'min:3'),
            'lastname' => array('required', 'min:3'),
            'email' => array('required', 'regex:/^.+@aiub\.edu$/'),
            'password' => array('required', 'min:6', 'same:confirm_password'),
            'confirm_password' => array('required'),
        ];
    }
}
