<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserEditRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     **/
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
            'name' => 'bail|required|string|min:4|unique:users,name,'. $this->user->id,
            'email' => 'bail|required|email|min:10|max:255|unique:users,email,'. $this->user->id,
            //'password' => 'bail|required_if:user_id,'.$this->user->id.'|between:6,30'
            'confirm_password' => 'same:password',
            'role' => 'in:administrator,editor'
        ];
    }
}
