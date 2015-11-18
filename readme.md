> 学习了一段时间的laravel,小结一下最近做的laravel小任务,写下来才知道好乱糟糟，还是以记录学习的资料为主，写的很糟糕，还需要再揣度多屡屡思路。
> 20151103-16
> * 源码地址：https://github.com/dingyiming/xc-addinfo-1103
> * 学习资料：
>   * [laravel学院](http://laravelacademy.org)
>   * [laravist.com](http://laravist.com)
>   * [laracasts.com](http://laracasts.com)
>   * [laravelcollective](http://laravelcollective.com)
>   * [vuejs](http://cn.vuejs.org)

# 序
* 预先准备
* 关节点
* 登录
* 用户信息增改删查与权限区分
* 员工管理与权限区分
* 字段查询
* 修改个人密码
* 前端vue-form验证
* dingo/API + vue-resource 唯一性判断
* 添加Oauth2.0
* 拓展

# 预先准备

* 学习了laravel

* 创建项目 ：打开终端，新建文件夹`mkdir dev`,下载laravel项目源码
```
composer create-project laravel/laravel addinfo

```
* `php artisan server 访问localhost:8000`查看

* 配置好`.env`数据库配置


> 在我学了一阵子的laravel后，感觉到有很多东西都是了解到，但却不清晰，然后接到这个任务我开始着手实践一下，自然没想象的那么顺利，其中遇到了很多看起来很基础的问题，往往会卡我半天甚至是一天，真的蛮郁闷的，在自己的草稿本上多少有些残留，回顾一下，很有收获，`其中得到了laravel学院和Laravist.com很大的帮助，非常感谢`；


> 刚刚开始的时候，我恰巧看了Laravist.com关于API的那一个系列教程（60元），我按着他得路子做了一些开头，我其实是很想用vuejs做成SPA的，不过自己还不会做，还是应该先以完成任务为目标，一步步改进自己，所以还是使用模板Blade来渲染视图。

> 我先用bootstrap做了下页面，也由于一些原因，还没用上`SCSS`,希望后面有时间可以尝试改进一下，在此就不放页面样式了，主要做些关键点的记录，现在想想还是一团糟的，得抓重点回忆。

# 关节点
 我觉着在往常的web应用中主要是这几个关节点：
 1.数据库连接配置： `.env`
 2.路由 ：  (访问的URL)从哪里去找谁(一般找控制器) http://laravelacademy.org/post/53.html
 3.控制器 ： 写逻辑操作和少量的数据验证与数据操作(Eloquent很快捷)http://laravelacademy.org/post/60.html
 4.数据处理： 辅助控制器进行一些数据处理与快捷映射，
   * 模型类 : app/Http/Model
   * 请求验证Requests : app/Http/Requests
   * 数据仓库Repositories: app/Http/Repositories （laravel不自带）
   数据仓库Repositories配置方法：http://segmentfault.com/a/1190000003488038

 5.把结果数据传递给视图：视图渲染页面(blade) ，视图基本上都是使用`blade`和 `Illuminate\Html`
静态资源的引用：`/assets/css/all.css`
   参考资料：
   * http://laravelacademy.org/post/76.html
   * http://laravelacademy.org/post/79.html
   * https://laravist.com/article/14
   * http://laravelcollective.com/docs/5.1/html

 6.在laravel重要的ServiceProvider在`config/app.php`里配置后可在全局快捷使用；
 7.消息反馈 ：参考：http://laravelacademy.org/post/68.html
在控制器中使用larvel一次性Session:
```
 $request->session()->flash('status1', $msg1);
```
在视图中判断显示
```
@if(session('status1'))
    <div id="status"   class="alert alert-success pull-right" role="alert"
         style="width:300px;position: absolute;bottom: 50px;right: 0px; text-align: center;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>OK!</strong> {{session('status1')}}
    </div>
@endif

<script>
 $(document).ready(function () {
        $("#status").stop(true, false).animate({"right": 100}, 500);
        setTimeout(function () {
            $('#status').fadeOut(2000);
        }, 2000)

    });
</script>
```

# 登录 
> 我把用户信息的增改删查作为`resource`路由，接着是因为用户信息的操作是需要用户登录才操作的，所以，我跟着laravel学院的教程做了下laravel内置的auth注册登录；
> 使用laravel内置 auth，
> 参考资料：http://laravelacademy.org/post/1258.html

* laravel自带了开箱即用的auth注册登录(只需要配置一下路由和视图)，已有用户模型`App\User`，控制器在`app\Http\Controllers\Auth\AuthController.php`

* 默认是使用`email`进行注册登录，可以在`AuthController.php`里进行修改一些验证以及默认的登录字段 `protected $username = 'name';`

* 自动生成表 `php artisan migrate` 数据库出现三张表

* 添加登录路由,在`app\Http\routes.php`

*  创建视图 在`resources/views/auth/login.blade.php`

* 表单如果是自己写得HTML，需要加上隐藏的csrf_tokern,
在blade中form下输入 `{!! csrf_field()!!}`即可；

* 修改登录成功后的跳转地址，
在`app\Http\Controllers\Auth\AuthController.php`中添加protected $redirectPath = '/userinfo';

* 现在可以正常注册登录了，然而我在这里遇到个坑，是关于密码加密的，如果改了加密方法却没改校验方法，就永久登录失败(注册成功后会自动登录，退出后将不能登录，报错信息为：`These credentials do not match our records`)
laravel在auth中使用了`  'password' => bcrypt($data['password'])` 即使用了内置的`bcrypt()`方法加密，这是不可逆的`Hash加密`,并且我自己还比对了下，发现每次相同字符串生成的密文还是不同的，如果需要验证这个加密，就使用`Hash::check($input, $oldpwd)`验证，返回值为`true/false`

* 显示错误
```
@if (count($errors) > 0)
//此处添加错误反馈，
//例： swal("对不起", "xxx", "error");//sweetalert不过有点过，

//可以使用bootstrap的alert
@endif
```

# 用户信息增改删查与权限区分
* 权限区分 http://laravelacademy.org/post/577.html
我在表中添加了用于区分权限的字段，在`app/Providers/AuthServiceProvider.php`中进行权限分配：
```
 public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        //权限1,可以查看全部录入的信息,以及所有员工
        $gate->define('see-all', function ($user) {
            return $user->authority === 1;
        });

        //权限2,可以查看部门提交的数据
        $gate->define('see-dep', function ($user) {
            return $user->authority === 2;
        });

        //权限3,可以查看自己提交的数据
        $gate->define('see-me', function ($user) {
            return $user->authority === 3;
        });
    }
```
* 路由
```
//登录用户才能访问进行用户信息操作
Route::group(['middleware' => 'auth'], function () {
    resource('userinfo', 'UserinfosController');
});
```
* Model设置,对应表、可填充字段、表关联
> 资料：http://laravelacademy.org/post/140.html
> 逆向的远层一对多：https://github.com/znck/belongs-to-through
```
 protected $table = 'userinfos';

    protected $fillable = [
        'phone',
        'name',
        'email',
    ];

    //多个信息对应一个录入信息的人
    public function user()
    {
        return $this->belongsTo('App\User', 'addman_id', 'id');
    }

    //格式化生日时间
    public function setBirthdayAttribute($birthday)
    {
        return $this->attributes['birthday'] = Carbon::createFromFormat('Y-m-d', $birthday);
    }

    //userinfo按照用户ID倒序
    public function scopeOrdered($query)
    {
        $query->OrderBy('userinfos.id', 'desc');
    }
```
* 控制器
```
//分权限显示用户信息
    public function index(Request $req)
    {
        $datas = null;
        switch ($req) {
            case $req->user()->can('see-all'):
                $datas = $this->userinfos->selectAll();
                break;
            case $req->user()->can('see-dep'):
                $datas = $this->userinfos->selectDep($this->user['dep_id']);
                break;
            case $req->user()->can('see-me'):
                $datas = $this->userinfos->selectMe($this->user['id']);
                break;
        }
        if ($datas) return view('userinfo.index', compact('datas'));
        return $this->responseResult(null, $req, '查询失败', null, 'userinfo');
    }
```
* 自建的数据仓库 App/Repositories/UserinfoRepository.php
```
public function selectAll()
    {
        return Userinfo::ordered()->Paginate(env('PAGE_ROWS'));
    }

    public function selectDep($dep_id)
    {
        return Department::find($dep_id)
            ->userinfos()
            ->ordered()
            ->Paginate(env('PAGE_ROWS'));
    }

    public function selectMe($user_id)
    {
        return User::find($user_id)
            ->userinfos()
            ->ordered()
            ->Paginate(env('PAGE_ROWS'));
    }

```
* 视图，省略。。。
> 上面主要记录了分权限进行的录入信息查看，其它增改删都会基于这里，具体看源码


# 基于权限的员工管理

* `routes.php`
```
//员工管理
Route::group(['middleware' => 'auth'], function () {
    resource('users', 'UsersController');
});
```
* Model :`app/User.php`
```
  protected $table = 'users';
    protected $fillable = ['email', 'password', 'realname', 'dep_id', 'authority'];
    protected $hidden = ['password', 'remember_token'];

    //一个录入信息的人对应多个录入的信息
    public function userinfos()
    {
        return $this->hasMany('App\Userinfo', 'addman_id', 'id');
    }

    //一个员工属于一个部门
    public function dep()
    {
        return $this->belongsTo('App\Department', 'dep_id', 'id');
    }
```
* 控制器 `UsersController.php`
```
//显示员工管理页面
    public function index(Request $request)
    {
        switch ($request) {
            case $request->user()->can('see-all'):
                $users = $this->users->getAllUser();
                break;
            case $request->user()->can('see-dep'):
                $users = $this->users->getDepUser($this->auth['dep_id']);
                break;
            default :
                return $this->responseResult(null, $request, '你没有权限', '', 'userinfo');
        }
        return view('user.index', compact('users'));
    }
```

* `UserRepository.php`
```
class UserRepository implements UserRepositoryInterface
{
    public function getAllUser()
    {
        return $this->alluser()->Paginate(env('PAGE_ROWS'));
    }

    public function getDepUser($dep_id)
    {
        $users = $this->alluser();
        return $users->where('dep_id', $dep_id)->Paginate(env('PAGE_ROWS'));
    }

    private function alluser()
    {
        $users = User::with('dep')
            ->select('users.*', 'departments.dep_name')
            ->leftJoin('departments', 'departments.id', '=', 'users.dep_id')
            ->OrderBy('dep_id');
        return $users;
    }
}
```

# 字段查询
> `->where($field, 'like', '%' . $data . '%')`

```
 //搜索姓名/手机/身份证
    public function search(Request $req)
    {
        $name = $req->input('name');
        $phone = $req->input('phone');
        $identity = $req->input('identity');

        switch (true) {
            case !empty($name):
                $datas = $this->userinfos->search($req, 'name', $name);
                break;
            case !empty($phone):
                $datas = $this->userinfos->search($req, 'phone', $phone);
                break;
            case !empty($identity):
                $datas = $this->userinfos->search($req, 'identity', $identity);
                break;
            default:
                return $this->responseResult(null, $req, '请填写查询条件', '', 'userinfo');
        }
        if ($datas->total() > 0) return view('userinfo.index', compact('datas'));
        return $this->responseResult(null, $req, '查询不到你要的内容', '', 'userinfo');
    }
```
* 对搜索也限定了权限
```
public function search($req, $field, $data)
    {
        switch ($req) {
            case $req->user()->can('see-all'):
                return $this->commonWhere($field, $data)
                    ->Paginate(env('PAGE_ROWS'));
                break;
            case $req->user()->can('see-dep'):
                $dep_id = $req->user()['dep_id'];
                return Department::findOrFail($dep_id)
                    ->userinfos()
                    ->where($field, 'like', '%' . $data . '%')
                    ->ordered()
                    ->Paginate(env('PAGE_ROWS'));
                break;
            case $req->user()->can('see-me'):
                return $this->commonWhere($field, $data)
                    ->where('addman_id', $req->user()['id'])
                    ->Paginate(env('PAGE_ROWS'));
                break;
        }
    }
```

# 修改个人密码
* 关键也就是前面在登录提到的加密和验证密码的问题，用了laravel自带方法：`bcrypt()`(即`Hash::make()`)和`Hash::check('输入的老密码'，'原密码')`
```
//更改密码
    public function updatereset(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required | confirmed',
        ]);

        $user = User::find($this->auth['id']);
        $input = $request->all();
        $old_pwd0 = $user['password'];
        $old_pwd1 = $input['old_password'];
        if (Hash::check($old_pwd1, $old_pwd0)) {
            $user->password = Hash::make($input['new_password']);
            $res = $user->save();
            return $this->responseResult($res, $request, '修改失败', '修改成功', '/userinfo');
        }
        return $this->responseResult(null, $request, '原密码不正确', '', '/users/resetpwd');
    }
```


# 前端vue-form验证
> vuejs官网 : http://cn.vuejs.org
> vuejs: https://github.com/vuejs/vue
> vue-form : https://github.com/fergaldoyle/vue-form
* 页面需要添加一些标识
```
<div class="main-title container shadow-z-1" id="app">
                    <form v-form name="myform" @submit.prevent="onSubmit" method="post" action="/auth/login" id="myform"
                          role="form">
                        {!! csrf_field() !!}
                        <legend class="create-form-title">登录</legend>
                        <div class="form-group row">
                            <label for="name" class="col-md-3 control-label">邮箱</label>

                            <div class="col-md-9">
                                <input type="email" class="form-control" placeholder="example@xici.net"
                                       name="email" v-model="model.email" v-form-ctrl name="email"/>

                                <div class="errors pull-left" v-if="myform.$submitted">
                                    <span class="form-span-error" v-if="myform.email.$error.email">* 请输入正确的邮箱</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pwd" class="col-md-3 control-label">密码</label>

                            <div class="col-md-9">
                                <input type="password" class="form-control" id="password" placeholder="密码"
                                       name="password" required v-model="model.password" v-form-ctrl maxlength="16"
                                       minlength="6"/>

                                <div class="errors pull-left" v-if="myform.$submitted">
                                    <span class="form-span-error" v-if="myform.password.$error.required">* 请输入密码</span>
                                    <span class="form-span-error"
                                          v-if="myform.password.$error.minlength">* 请输入6到16位密码</span>
                                    <span class="form-span-error"
                                          v-if="myform.password.$error.maxlength">* 请输入6到16位密码</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="pull-right">
                                <button type="reset" class="btn btn-secondary">重置</button>
                                <input type="submit" class="btn btn-success" value="GO"/>
                            </div>
                        </div>
                    </form>
                </div>
```
* js代码
```
new Vue({
    el: '#app',
    data: {
        myform: {},
        model: {}
    },
    methods: {
        onSubmit: function() {
            console.log(this.myform.$valid);
            if(this.myform.$valid == true)
                $('#myform').submit();
        }
    }
});
```

# dingo/API + vue-resource 唯一性判断
> dingo/API : https://github.com/dingo/api
> vue-resource : https://github.com/vuejs/vue-resource
* composer.json
```
 "require": {
        "php": ">=5.5.9",
        "laravel/framework": "5.1.*",
        "illuminate/html": "^5.0",
        "lucadegasperi/oauth2-server-laravel": "5.0.*",
        "dingo/api": "1.0.*@dev"
    },
```
* app.php配置
```
//dingo/api
Dingo\Api\Provider\LaravelServiceProvider::class
```
* `.env`配置
```
API_STANDARDS_TREE=vnd
API_PREFIX=api
API_VERSION=v1
API_DEBUG=true

```

* 路由
```
//dingo/api
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('onephone/{params}', 'ValidController@onephone');
        $api->get('oneidentity/{params}', 'ValidController@oneidentity');
    });
});
```

* app/Api/Controllers/BaseController.php
```
class BaseController extends Controller
{
    use Helpers;//使用Dingo内置帮助函数
}
```
* 其它Controller继承BaseController.php，从而使用Dingo内置帮助函数

* vue-resource https://github.com/vuejs/vue-resource
```
 onephone: function () {
            this.$http.get('/api/onephone/' + this.model.phone.trim(), function (data, status, request) {
                if (data == 0) {
                    this.model.onephone = false;
                }
                if (data == 1) {
                    console.log(data);
                    this.model.onephone = true;
                }
            }).error(function (data, status, request) {
            });
        },
```

# 添加Oauth2.0
> laravel-Oauth2.0 :https://github.com/lucadegasperi/oauth2-server-laravel

* 配置
```
 'providers' => [
//Oauth2.0
LucaDegasperi\OAuth2Server\Storage\FluentStorageServiceProvider::class,
LucaDegasperi\OAuth2Server\OAuth2ServerServiceProvider::class,]

'aliases' =>[
'Authorizer' => LucaDegasperi\OAuth2Server\Facades\Authorizer::class,]

```
* 数据表生成
```
php artisan migrate
```

* 路由
```
//Oauth2登录
Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});
```




# 拓展
> 或者说接下来还需要完善的一些东西
* scss页面重构，现在的页面的确很low；
* 把前端验证通过`vuejs、vue-form、vue-resource`进一步完善；
* 学习`vue-router`的使用节省不必要的跳转；
* 文档、文档、文档，积累很重要，还有很多要琢磨的东西，一步步来。
* 能做的太少，要做要学的很多，得计划着来