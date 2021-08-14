<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WovenRequest extends FormRequest
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
            "date" => "required",
            "customer_id" => "required",
            "lable" => "required",
            "designer_id" => "required",
            "design_number" => "required",
            "salesrep_id" => "required",
            "weaver_id" => "required",
            "warps_id" => "required",
            "picks" => "required",
            "total_picks" => "required",
            "loom_id.*" => "required",
            "total_repet.*" => "required",
            "wastage" => "required",
            "finishing_id" => "required",
            "cost_in_roll" => "required",
            "total_cost" => "required",
            "catagory" => "required",
            "length" => "required",
            "sq_inch" => "required",
            "customer_grade" => "required",
            "width" => "required",
            "add_on_cast.*" => "required",
            "needle.*" => "required",
            
        ];

        if ($this->isMethod("put")) {
            $validation = [
                "date" => "required",
                "customer_id" => "required",
                "lable" => "required",
                "designer_id" => "required",
                "design_number" => "required",
                "salesrep_id" => "required",
                "weaver_id" => "required",
                "warps_id" => "required",
                "picks" => "required",
                "total_picks" => "required",
                "loom_id.*" => "required",
                "total_repet.*" => "required",
                "wastage" => "required",
                "finishing_id" => "required",
                "cost_in_roll" => "required",
                "total_cost" => "required",
                "catagory" => "required",
                "length" => "required",
                "sq_inch" => "required",
                "customer_grade" => "required",
                "width" => "required",
                "add_on_cast.*" => "required",
                "needle.*" => "required",
            ];
        }

        return $validation;
    }
}
