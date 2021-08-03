<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FoldRequest extends FormRequest
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
        $validation = [
            "type_of_fold" => "required",
            "image" => "required",
            "minimum_mm" => "required",
            
            
            
        ];

        if ($this->isMethod("put")) {
            $validation = [
                "type_of_fold" => "required",
                "image" => "required",
                "minimum_mm" => "required",
            
            ];
        }

        return $validation;
    }
}
