<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUser extends FormRequest
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
            'email' => 'required',
            'mobile' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'email.required' => trans('validation.required'),
            'mobile.required' => trans('validation.required'),
        ];
    }
}
