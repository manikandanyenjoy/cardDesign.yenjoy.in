<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            "full_name"                 => "required|min:4|max:50",
            "email"                     => ["required","email",Rule::unique('vendor_masters')->ignore($this->seller)],
            "mobile_number"             => ["required","min:10","numeric", Rule::unique('vendor_masters')->ignore($this->seller)],
            "billing_address"           => "required",
            "shipping_address"          => "required",
            "bank_name"                 => "required",
            "account_no"                => ["required",Rule::unique('vendor_masters')->ignore($this->seller)],
            "IFSCCode"                  => "required",
            "opening_balance"           => "required",
            "credit_period"             => "required",
            "grade"                     => "required",
            "GST"                       => ["required",Rule::unique('vendor_masters')->ignore($this->seller)],
            "category"                  => "nullable",
            "status"                    => "required",
            
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
            "email.unique"           => "This email already exists",
            "mobile_number.unique"   => "This mobile number already exists",
            "account_no.unique"      => "This account number already exists",
            "GST.unique"             => "This GST number already exists",
            "password.regex"         => "Password must be minimum 8 character and should contain atleast one number and a special character",
        ];
    }
}
