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

                $validate['details.type_structure'] = 'required|in:single,duplex,multifamily,garage';
                $validate['details.copyright'] = 'required|date_format:Y-m-d';
                $validate['details.lot_char'] = 'array|in:corner,narrow,sloping,view';
                $validate['details.lot_siope'] = 'nullable|in:1,2,3';

                $validate['rooms.r_master'] = 'nullable|in:1,2,3,4';
                $validate['rooms.r_bedrooms'] = 'nullable|in:1,2,3,4';
                $validate['rooms.r_full_baths'] = 'nullable|in:1,2,3,4';
                $validate['rooms.r_half_baths'] = 'nullable|in:1,2,3,4';

                if( count($this->input('similar')) >= 1 && $this->input('similar')[0] != null ){
                    $validate['similar.*'] = 'exists:plans,plan_number';
                }

                $validate['dimensions.stories'] = 'nullable|in:1,1.5,2,3,4';
                $validate['dimensions.width_ft'] = 'required|numeric';
                $validate['dimensions.width_in'] = 'nullable|numeric';
                $validate['dimensions.depth_ft'] = 'required|numeric';
                $validate['dimensions.depth_in'] = 'nullable|numeric';
                $validate['dimensions.height_ft'] = 'required|numeric';
                $validate['dimensions.height_in'] = 'nullable|numeric';

                $validate['square_ft.str_total'] = 'nullable|numeric';
                $validate['square_ft.unit_total'] = 'nullable|numeric';
                $validate['square_ft.1_floor'] = 'nullable|numeric';
                $validate['square_ft.2_floor'] = 'nullable|numeric';
                $validate['square_ft.3_floor'] = 'nullable|numeric';
                $validate['square_ft.lower_floor'] = 'nullable|numeric';
                $validate['square_ft.bonus'] = 'nullable|numeric';
                $validate['square_ft.garage'] = 'nullable|numeric';
                $validate['square_ft.storage'] = 'nullable|numeric';
                $validate['square_ft.porch'] = 'nullable|numeric';
                $validate['square_ft.deck'] = 'nullable|numeric';
                $validate['square_ft.patio'] = 'nullable|numeric';

                $validate['custom__sq_ft.custom_desc.*'] = 'required_with:custom_sq.*|max:100';
                $validate['custom__sq_ft.custom_sq.*'] = 'required_with:custom_desc.*|nullable|numeric';

                $validate['construction.roof_frame'] = 'nullable|in:stick,truss';
                $validate['construction.ext_walls'] = 'nullable|in:block,2x4,2x6';
                $validate['construction.found_type'] = 'array|in:basement,crawlspace,daylight,pier,slab,walkout';

                $validate['ceiling.celing_1_floor'] = 'nullable|numeric';
                $validate['ceiling.celing_2_floor'] = 'nullable|numeric';
                $validate['ceiling.celing_3_floor'] = 'nullable|numeric';
                $validate['ceiling.celing_lower_floor'] = 'nullable|numeric';

                $validate['roof.primary'] = 'nullable|numeric';
                $validate['roof.secondary'] = 'nullable|numeric';

                $validate['garage.car'] = 'nullable|integer';
                $validate['garage.car_location'] = 'nullable|in:front,rear,side';
                $validate['garage.car_options'] = 'array|in:attached,carport,detached,drive-under,none,tandem,living_space';

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
