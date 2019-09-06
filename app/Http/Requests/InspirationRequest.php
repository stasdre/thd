<?php

namespace Thd\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InspirationRequest extends FormRequest
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
        $rules = [];

        $rules['name'] = 'required|max:100';
        $rules['in_menu'] = 'boolean';
        $rules['link'] = 'required|unique:inspirations,link|max:100';
        $rules['title'] = 'required|max:100';
        $rules['img_above_logo'] = 'nullable|image|dimensions:min_width=230,min_height=230';
        $rules['logo_img'] = 'nullable|image';
        $rules['brochure_link'] = 'nullable|max:191';
        $rules['locator_link'] = 'nullable|max:191';
        $rules['main_img'] = 'nullable|image|dimensions:min_width=750,min_height=380';
        $rules['main_img_link'] = 'nullable|required_with:main_img|max:191';
        $rules['first_img'] = 'nullable|image|dimensions:min_width=235,min_height=235';
        $rules['first_img_link'] = 'nullable|required_with:first_img|max:191';
        $rules['second_img'] = 'nullable|image|dimensions:min_width=235,min_height=235';
        $rules['second_img_link'] = 'nullable|required_with:second_img|max:191';
        $rules['third_img'] = 'nullable|image|dimensions:min_width=235,min_height=235';
        $rules['third_img_link'] = 'nullable|required_with:third_img|max:191';
        $rules['order'] = 'integer';

        return $rules;
    }
}
