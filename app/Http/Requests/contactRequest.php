<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactRequest extends FormRequest
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
            "nomComplet" => "required | min:5 | max:40 ",
            "email" => "required | email",
            "objet" => "required | min:10| max:50",
            "message" =>"required | min: 25 | max:300"

        ];
    }
}
