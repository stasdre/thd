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
        $validate = [];

        switch ($this->method()){
            case 'POST':

                $validate['designer_admin'] = 'required_if:designer,designer';
                $validate['designer_partner'] = 'required_if:designer,designer_partner';
                $validate['plan_number'] = 'required|integer|unique:plans,plan_number';
                $validate['name'] = 'required|max:100';
                $validate['type_structure'] = 'required|in:single,duplex,multifamily,garage';
                $validate['copyright'] = 'required|date_format:Y-m-d';
                $validate['lot_char'] = 'array|in:corner,narrow,sloping,view';
                $validate['lot_siope'] = 'nullable|in:1,2,3';
                $validate['r_master'] = 'nullable|in:1,2,3';
                $validate['r_bedrooms'] = 'nullable|in:1,2,3';
                $validate['r_full_baths'] = 'nullable|in:1,2,3';
                $validate['r_half_baths'] = 'nullable|in:1,2,3';

                if( count($this->input('similar')) >= 1 && $this->input('similar')[0] != null ){
                    $validate['similar.*'] = 'exists:plans,plan_number';
                }

                $validate['stories'] = 'nullable|in:1,1.5,2,3,4';

                $validate['width_ft'] = 'required|numeric';
                $validate['width_in'] = 'nullable|numeric';
                $validate['depth_ft'] = 'required|numeric';
                $validate['depth_in'] = 'nullable|numeric';
                $validate['height_ft'] = 'required|numeric';
                $validate['height_in'] = 'nullable|numeric';

                $validate['str_total'] = 'nullable|numeric';
                $validate['unit_total'] = 'nullable|numeric';
                $validate['1_floor'] = 'nullable|numeric';
                $validate['2_floor'] = 'nullable|numeric';
                $validate['3_floor'] = 'nullable|numeric';
                $validate['lower_floor'] = 'nullable|numeric';

                $validate['bonus'] = 'nullable|numeric';
                $validate['garage'] = 'nullable|numeric';
                $validate['storage'] = 'nullable|numeric';
                $validate['porch'] = 'nullable|numeric';
                $validate['deck'] = 'nullable|numeric';
                $validate['patio'] = 'nullable|numeric';

                $validate['custom_desc.*'] = 'required_with:custom_sq.*|max:100';
                $validate['custom_sq.*'] = 'required_with:custom_desc.*|nullable|numeric';

                $validate['roof_frame'] = 'nullable|in:stick,truss';
                $validate['ext_walls'] = 'nullable|in:block,2x4,2x6';
                $validate['found_type'] = 'array|in:basement,crawlspace,daylight,pier,slab,walkout';

                $validate['celing_1_floor'] = 'nullable|numeric';
                $validate['celing_2_floor'] = 'nullable|numeric';
                $validate['celing_3_floor'] = 'nullable|numeric';
                $validate['celing_lower_floor'] = 'nullable|numeric';

                $validate['primary'] = 'nullable|numeric';
                $validate['secondary'] = 'nullable|numeric';

                $validate['car'] = 'nullable|integer';
                $validate['car_location'] = 'nullable|in:front,rear,side';
                $validate['car_options'] = 'array|in:attached,carport,detached,drive-under,none,tandem,living_space';

                $validate['style_id.*'] = 'sometimes|exists:styles,id';
                $validate['collection_id.*'] = 'sometimes|exists:collections,id';

                return $validate;
            case 'PATCH':
                return [
                    'name' => 'required|max:100',
                    'plan_number' => 'required|integer|unique:plans,plan_number,'.$this->route('house_plan')->id.',id',
                    //'style_id' => 'required|array',
                    //'collection_id' => 'required|array'
                ];
        }
    }
}
