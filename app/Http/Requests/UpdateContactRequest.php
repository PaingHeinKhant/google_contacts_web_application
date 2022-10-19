<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "firstName" => "required|min:4",
            "lastName" => "required|min:4",
            'phone'=>'required|Numeric',
            'company'=>'nullable',
            'birthday'=>'nullable',
            'email' => 'nullable',
            "image" => "nullable|mimes:jpeg,png|file|max:512",
        ];
    }
}
