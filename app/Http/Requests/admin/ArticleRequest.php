<?php

namespace App\Http\Requests\admin;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'title' => 'required',
            'cid' => 'required',
            'desc' => 'required|between:10,50',
            'content' => 'required|between:300,99999',
        ];
    }
        public function messages()
    {
        return [
            'title.required' => '请填写标题',
            'cid.required' => '请选择分类',
            'desc.between' => '请填写填写10-50个字符的标题',
            'desc.required' => '请填写描述',
            'content.required' => '文章内容不能为空',
            'content.between' => '文章内容至少三百字',
        ];
    }
}
