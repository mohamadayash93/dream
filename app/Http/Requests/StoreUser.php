<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return in_array(Auth::user()->role, ["admin", "entry"]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'mobile' => 'required|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'mobile.required' => trans('validation.required'),
            'mobile.unique' => trans('validation.unique'),
        ];
    }
}
