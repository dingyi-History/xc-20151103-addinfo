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
        $rules =  [
            'phone' => 'required | digits_between:11,11 | numeric | unique:userinfos,phone',
            'name' => 'required | string',
            'email' => 'required | email',
            'identity' => 'required | between:15,18 | unique:userinfos,identity',
            'sex' => 'required | in:未知,男,女',
            'relationship_status' => 'required | in: 未知,单身,恋爱,订婚,已婚,离异,丧偶',
            'sex_orietation' => 'required | in:未知,男性,女性,双性',
            'income_level' => 'required | in: 未知,穷人,低收入,中等收入,高收入,富人',
            'blood_type' => 'required | in:未知,A,B,AB,O',
            'birthday' => 'required',
            'residence' => 'required  |string',
            'hometown' => 'required |string',
            'degree'=> 'required |string',
            'school'=> 'required |string',
            'major'=> 'required |string',
            'profession' => 'required |string',
            'qq'=> 'required | digits_between:1,11 | numeric',
            'weibo'=> 'required |string',
            'weixin'=> 'required |string',
            'source'=> 'required |string',
            'user_id'=> 'required |string',
            'screen_name'=> 'required |string',
            'address'=> 'required |string'
        ];

        if($this->method() == 'PATCH')
        {
            $rules['phone'] = 'required | digits_between:11,11 | numeric ';
            $rules['identity'] = 'required';
        }
        return $rules;
    }
}
