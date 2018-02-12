<?php

namespace Thd\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlansRequest extends FormRequest
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
        switch ($this->method()){
            case 'POST':
                return [
                    'name' => 'required|max:100',
                    'plan_number' => 'required|integer|unique:plans,plan_number',
                    'style_id' => 'required|array',
                    'collection_id' => 'required|array'
                ];
            case 'PATCH':
                return [
                    'name' => 'required|max:100',
                    //'plan_number' => 'required|integer|unique:plans,plan_number,'.$this->input('plan_number'),
                    'style_id' => 'required|array',
                    'collection_id' => 'required|array'
                ];
        }
    }
}
