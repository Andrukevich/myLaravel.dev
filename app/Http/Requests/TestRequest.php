<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
        $rules =  [
            'email' => 'required|email|unique:tests',
            'age' => 'required|integer|between:18,50',
            'gender' => 'in:Mr,Ms',
            'about' => 'required|min:10|max:255'
            // 'file' => 'file'
        ];

        return $rules;
    }
}
