<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'academicid' => array('required', 'regex:/^\d{2}-\d{5}-[1-3]$/'),
            'firstname' => array('required', 'min:3'),
            'lastname' => array('required', 'min:3'),
        ];
    }
}
