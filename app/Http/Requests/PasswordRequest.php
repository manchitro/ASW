<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'oldpassword' => array('required', 'min:6'),
            'newpassword' => array('required', 'min:6', 'different:oldpassword'),
            'confirmnewpassword' => array('required', 'min:6', 'same:newpassword'),
        ];
    }
}
