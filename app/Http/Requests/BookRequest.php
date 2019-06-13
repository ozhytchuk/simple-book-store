<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:75',
            'author' => 'required|string|min:5|max:75',
            'description' => 'required',
            'poster' => 'required|string|min:7',
            'url' => 'required|string|min:7',
            'price' => 'required|numeric',
            'date' => 'nullable|date',
        ];
    }
}
