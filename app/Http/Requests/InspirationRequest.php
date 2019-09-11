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

        if($this->method() == 'POST')
            $rules['link'] = 'required|unique:inspirations,link|max:100';
        else
            $rules['link'] = 'required|unique:inspirations,link,'.$this->route('inspiration')->id.',id|max:100';
        
        $rules['title'] = 'required|max:100';
        $rules['img_above_logo'] = 'nullable|image|dimensions:min_width=230,min_height=230';
        $rules['logo_img'] = 'nullable|image';
        $rules['brochure_link'] = 'nullable|max:191';
        $rules['locator_link'] = 'nullable|max:191';
        $rules['main_img'] = 'nullable|image|dimensions:min_width=700,min_height=300';
        $rules['main_img_link'] = 'nullable|required_with:main_img|max:191';
        $rules['first_img'] = 'nullable|image|dimensions:min_width=230,min_height=230';
        $rules['first_img_link'] = 'nullable|required_with:first_img|max:191';
        $rules['second_img'] = 'nullable|image|dimensions:min_width=230,min_height=230';
        $rules['second_img_link'] = 'nullable|required_with:second_img|max:191';
        $rules['third_img'] = 'nullable|image|dimensions:min_width=230,min_height=230';
        $rules['third_img_link'] = 'nullable|required_with:third_img|max:191';
        $rules['order'] = 'integer';
        $rules['products.*.product_img'] = 'nullable|image|dimensions:min_width=230,min_height=230';
        $rules['products.*.title'] = 'max:100|required_with:products.*.product_img';
        $rules['products.*.link'] = 'max:191|required_with:products.*.product_img';

        return $rules;
    }
}
