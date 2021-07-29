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
            "last_name" => "required|alpha_num|min:4|max:50",
            "email" => "required|email|unique:buyers,email",
            "password" =>
                'required|confirmed|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            "address_line" => 'required|string|max:200',
            "location_id" => 'required|exists:states,id',
            "postal_code" => 'required|numeric|integer|min:5|max:10',
            "subscription_plan_id" => 'required|exists:subscription_plans,id'
        ];

        if ($this->isMethod("put")) {
            $validation["email"] = "required|string|max:50|unique:buyers,email," . $this->route("seller")->id;
            $validation["password"] = 'nullable|confirmed|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/';
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
