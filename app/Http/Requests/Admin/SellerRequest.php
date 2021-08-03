<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
            "first_name" => "required|alpha_num|min:4|max:50",
            "last_name" => "required|alpha_num|max:50",
            "email" => "required|email|unique:vendor_masters,email",
            "password" =>
                'required|confirmed|min:8',
            "mobile_number" => 'required|min:10|numeric',
            "bank_name" => 'required',
            "account_no" => 'required',
            "IFSCCode" => 'required',
            "opening_balance" => 'required',
            "credit_period" => 'required',
            "grade" => 'required',
            
        ];

        if ($this->isMethod("put")) {
        $validation = [
            "first_name" => "required|alpha_num|min:4|max:50",
            "last_name" => "required|alpha_num|max:50",
            "password" =>
                'required|confirmed|min:8',
            "mobile_number" => 'required|min:10|numeric',
            "bank_name" => 'required',
            "account_no" => 'required',
            "IFSCCode" => 'required',
            "opening_balance" => 'required',
            "credit_period" => 'required',
            "grade" => 'required',
            
        ];
    }

        return $validation;
    }

    public function messages()
    {
        return [
            "password.regex" =>
                "Password must be minimum 8 character and should contain atleast one number and a special character",
        ];
    }
}
