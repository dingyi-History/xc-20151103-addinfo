<?php
/**
 * Created by PhpStorm.
 * User: dingyiming
 * Date: 15/11/3
 * Time: 下午5:39
 */

namespace APP\Transformer;

use App\Transformer\Transformer;

class UserinfoTransformer extends Transformer
{
    public function transform($userinfo)
    {
        return[
            'mobile' => $userinfo['phone'],
            'realname' => $userinfo['name'],
            'mail' => $userinfo['email'],
            'iden' => $userinfo['identity'],
            'man' => $userinfo['sex'],
            'status' => $userinfo['relationship_status'],
            'orietation' => $userinfo['sex_orietation'],
            'income' => $userinfo['income_level'],
            'blood' => $userinfo['blood_type'],
            'birth' => $userinfo['birthday'],
            'current' => $userinfo['residence'],
            'home' => $userinfo['hometown'],
            'education' => $userinfo['degree'],
            'school' => $userinfo['school'],
            'specialty' => $userinfo['major'],
            'occupation' => $userinfo['profession'] ,
            'qq' => $userinfo['qq'],
            'sina' => $userinfo['weibo'],
            'webchat' => $userinfo['weixin'],
            'from' => $userinfo['source'],
            'uid' => $userinfo['user_id'],
            'uname' => $userinfo['screen_name'],
            'location' => $userinfo['address'],
        ];
    }
}