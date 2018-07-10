<?php

namespace App\Http\Requests\admin;

use App\Http\Requests\Request;

class CegoryRequest extends Request
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
            'name_class' => 'required',
            ];
    }
    public function messages()
    {
        return [
            'name_class.required' => '请填写分类名',
            ];
    }
}
