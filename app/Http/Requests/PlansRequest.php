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

        $validate['designer_admin'] = 'required_if:designer,designer';
        $validate['designer_partner'] = 'required_if:designer,designer_partner';

        if($this->method() == 'POST')
            $validate['plan_number'] = 'required|digits:4|unique:plans,plan_number';
        else
            $validate['plan_number'] = 'required|digits:4|unique:plans,plan_number,'.$this->route('house_plan')->id.',id';

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

        $validate['square_ft.str_total'] = 'nullable';
        $validate['square_ft.unit_total'] = 'nullable';
        $validate['square_ft.1_floor'] = 'nullable';
        $validate['square_ft.2_floor'] = 'nullable';
        $validate['square_ft.3_floor'] = 'nullable';
        $validate['square_ft.lower_floor'] = 'nullable';
        $validate['square_ft.bonus'] = 'nullable';
        $validate['square_ft.garage'] = 'nullable';
        $validate['square_ft.storage'] = 'nullable';
        $validate['square_ft.porch'] = 'nullable';
        $validate['square_ft.deck'] = 'nullable';
        $validate['square_ft.patio'] = 'nullable';

        $validate['custom__sq_ft.custom_desc.*'] = 'required_with:custom_sq.*|max:100';
        $validate['custom__sq_ft.custom_sq.*'] = 'required_with:custom_desc.*|nullable|numeric';

        $validate['construction.roof_frame'] = 'nullable|in:stick,truss';
        $validate['construction.ext_walls'] = 'nullable|in:block,2x4,2x6';
        $validate['construction.found_type'] = 'array|in:Basement,Crawlspace,Daylight basement,Pier,Slab,Walkout basement';

        $validate['ceiling.celing_1_floor'] = 'nullable';
        $validate['ceiling.celing_2_floor'] = 'nullable';
        $validate['ceiling.celing_3_floor'] = 'nullable';
        $validate['ceiling.celing_lower_floor'] = 'nullable';

        $validate['roof.primary'] = 'nullable';
        $validate['roof.secondary'] = 'nullable';

        $validate['garage.car'] = 'nullable|integer';
        $validate['garage.car_location'] = 'nullable|in:front,rear,side';
        $validate['garage.car_options'] = 'array|in:attached,carport,detached,drive-under,none,tandem,living_space';

        $validate['style_id.*'] = 'sometimes|exists:styles,id';
        $validate['collection_id.*'] = 'sometimes|exists:collections,id';

        $validate['video_file'] = 'required_if:youtube,file|file';

        return $validate;
    }
}
