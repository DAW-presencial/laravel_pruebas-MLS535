<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
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
            'name'=>'required',
            'category'=>'required|min:2',
            'date'=>'required',
            'number'=>'required',
            'size'=>'required',
            'gender'=>'required',
            'description'=>'required',
            'email'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ];
    }
}
