<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
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
            'date' => array('required','date','after:yesterday'),
            'classtype' => array('required', 'regex:/^(lab|theory)$/'),
            'starttime' => array('required', 'min:0', 'max:24'),
            'endtime' => array('required', 'min:0', 'max:24', 'gt:starttime'),
            'room' => array('required', 'min:3',),
        ];
    }
}
