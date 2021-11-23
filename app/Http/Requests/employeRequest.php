<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class employeRequest extends FormRequest
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
            "nom"=> "required | min: 3 |max: 15",
            "prenom" => "required | min : 3 | max: 15",
            "poste" => "required | min : 3 | max: 30",
            "telephone" =>"required | numeric | max:10 ",
            "email" =>"required | email",
            "adresse" =>"required | max:100 "


        ];
    }
}
