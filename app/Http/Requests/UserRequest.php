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
        switch ($this->method()){
            case 'POST':
                return [
                    'email' => 'required|email|max:190|unique:users,email|unique:users,alt_email',
                    'alt_email' => 'email|max:190|unique:users,email|unique:users,alt_email',
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

            case 'PATCH':
                return [
                    'email' => 'required|email|max:190|unique:users,email,'.$this->route('user')->id.',id|unique:users,alt_email,'.$this->route('user')->id.',id',
                    'alt_email' => 'email|max:190|unique:users,email,'.$this->route('user')->id.',id|unique:users,alt_email,'.$this->route('user')->id.',id',
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
}
