<?php

namespace App\Http\Requests\admin;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'uname' => 'required',
            'password' => 'required|digits_between:6,18',
            'phone' => 'required',
            'sex' => 'required',
            'superuser' => 'required',
            'avatar' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'uname.required' => '请填写姓名',
            'password.required' => '请填写密码',
            'password.digits_between' => '请填写填写16-18位的密码',
            'phone.required' => '请填写手机号',
            'superuser.required' => '请选择权限',
            'sex.required' => '请选择性别',
            'avatar.required' => '请上传头像',
            'avatar.image' => '请上传(jpeg、png、bmp、gif、 或 svg)类型',
        ];
    }
}
