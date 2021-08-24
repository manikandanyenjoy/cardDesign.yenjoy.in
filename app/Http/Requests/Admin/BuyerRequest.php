<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BuyerRequest extends FormRequest
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
            "last_name" => "nullable|alpha_num|max:50",
            "email" => "required|email|unique:vendor_masters,email",
         
            "mobile_number" => 'required|min:10|numeric',
            "sales_rep" =>'required',
            // "secondary_email"=>'required',
            "bank_name" => 'required',
            "account_no" => 'required',
            "IFSCCode" => 'required',
            "opening_balance" => 'required',
            "credit_period" => 'required',
            "grade" => 'required',
            "company_name"=>'required',
            "company_phone"=> 'required|min:10|numeric',
            "billing_address"=>'required',
            "shipping_address"=>'required',
            "GST"=>'required',

            
        ];

        if($this->isMethod("post"))
        {
            $validation["password"] = 'required|confirmed|min:8';
        }

        if($this->isMethod("put"))
        {
            $validation["password"] = 'nullable|confirmed|min:8';
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
