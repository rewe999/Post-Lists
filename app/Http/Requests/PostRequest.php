<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'avatar'=> '',
            'name'=>'required|min:5|max:25|string',
            'price'=>'required|integer',
            'desc'=>'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Zbyt krótka nazwa',
            'desc.min' => 'Zbyt krótki opis',
        ];
    }
}
