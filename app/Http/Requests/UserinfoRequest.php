<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Userinfo;

class UserinfoRequest extends Request
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
        $rules = [
            'phone' => 'required |  numeric | unique:userinfos,phone',
            'name' => 'required | string',
            'email' => 'email',
            'identity' => 'required |  unique:userinfos,identity',
            'sex' => 'required | in:未知,男,女',
            'relationship_status' => 'required | in:未知,单身,恋爱,订婚,已婚,离异,丧偶',
            'sex_orietation' => 'required | in:未知,男性,女性,双性',
            'income_level' => 'required | in:未知,穷人,低收入,中等收入,高收入,富人',
            'blood_type' => 'required | in:未知,A,B,AB,O',
            'birthday' => 'required',
            'residence' => 'string',
            'hometown' => 'string',
            'degree' => 'string',
            'school' => 'string',
            'major' => 'string',
            'profession' => 'string',
            'qq' => 'numeric',
            'weibo' => 'string',
            'weixin' => 'string',
            'source' => 'string',
            'user_id' => 'string',
            'screen_name' => 'string',
            'address' => 'string',
            'remark' => '',
        ];

        if ($this->method() == 'PATCH') {
            $rules['phone'] = 'required | numeric ';
            $rules['identity'] = 'required';
        }
        return $rules;
    }
}
