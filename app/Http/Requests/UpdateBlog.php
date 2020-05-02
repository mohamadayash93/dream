<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBlog extends FormRequest
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
            'title_en' => 'required',
            'title_ar' => 'required',
            'image' => 'required',

        ];
    }

    public function messages()
    {
        return [

            'image.required' => trans('validation.required'),
            'title_en.required' => trans('validation.required'),
            'title_ar.required' => trans('validation.required'),

        ];
    }
}
