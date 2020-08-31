<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditContactRequest extends FormRequest
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
            'name' => 'required|string|max:500|min:5',
            'email' => 'required|string|unique:contacts,'.$this->route()->getParameter('id').'|email',
            'contact' => 'required|integer|unique:contacts,'.$this->route()->getParameter('id').'|digits:9',

          /*   'email'=>'email|unique:users,email,'.$this->route()->getParameter('id').',database_id'*/
        ];
    }
}
