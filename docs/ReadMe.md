* 需要录入的信息
```
class User extends Collection
{
    protected $fields = [
        'phone' => '', //手机号
        'name' => '', //真实姓名
        'email' => '',//邮箱
        'identity' => '',//身份证号
        'sex' => '未知',//性别
        'relationship_status' => '未知',//情感状态
        'sex_orietation' => '未知',//性取向
        'income_level' => '未知',//收入等级
        'blood_type' => '未知',//血型
        'birthday' => '1970-01-01',//生日
        'residence' => '',//当前所在地
        'hometown' => '',//家乡
        'degree' => '',//学历
        'school' => '',//毕业学校
      	'major'  => '',//专业
        'profession' => '',//职业
        'qq' => '',//qq号
        'weibo' => '',//微博号
        'weixin' => '',//微信号
        'source' => '',//来源
        'user_id' => '',//西祠ID
        'screen_name' => '',//西祠用户名
        'address' => ''//联系地址
];
//下拉选择
protected $enums =[
    'relationship_status' => ['未知','单身','恋爱','订婚','已婚','离异','丧偶'],
    'sex_orietation' => ['未知','男性','女性','双性'],
    'income_level' => ['未知','穷人','低收入','中等收入','高收入','富人'],
    'blood_type' => ['未知','A','B','AB','0'],
    'sex' => ['未知'，'男','女'],
];


}
```
> 添加screen_name 字段 表示 西祠显示的名字

* 西祠工作人员登录
Oauth2.0 Client
使用字段： 西祠邮箱 / 密码 /部门
