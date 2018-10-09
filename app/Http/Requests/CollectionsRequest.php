<?php

namespace Thd\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionsRequest extends FormRequest
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
        if($this->method() == 'PATCH'){
            return [
                'name' => 'required|max:100',
                'slug' => 'required|unique:collections,slug,'.$this->route('collection')->id.',id|alpha_dash|max:190',
                'short_name' => 'required|max:50',
                'description' => 'required',
                'in_filter' => 'boolean',
                'plan_title.*' => 'required_with:plan_img|max:100',
                'plan_url.*' => 'required_with:plan_img|max:190',
                'plan_img.*' => 'image|max:3000|dimensions:min_width=300,min_height=300',
                'plan_img_alt.*' => 'max:190'
            ];
        }else{
            return [
                'name' => 'required|max:100',
                'slug' => 'required|unique:collections,slug|alpha_dash|max:190',
                'short_name' => 'required|max:50',
                'description' => 'required',
                'in_filter' => 'boolean',
                'plan_title.*' => 'required_with:plan_img|max:100',
                'plan_url.*' => 'required_with:plan_img|max:190',
                'plan_img.*' => 'required_with:plan_title|image|max:3000|dimensions:min_width=300,min_height=300',
                'plan_img_alt.*' => 'max:190'
            ];
        }
    }
}
