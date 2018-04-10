<?php

namespace Thd\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'email' => 'required|email|max:190|unique:users,email',
            'alt_email' => 'email|max:190|unique:users,email',
            'role_user' => 'required|exists:roles,id',
            'name' => 'required|max:190',
            'last_name' => 'required|max:190',
            'company' => 'required_if:role_user,4,3',
            'zip' => 'required',
            'country' => 'required|alpha_dash|max:3',
            'state' => 'required|alpha_dash|max:3',
            'city' => 'required|alpha_dash|max:190',
            'address_1' => 'required'
        ];
    }
}
