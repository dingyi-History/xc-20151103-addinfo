<?php

namespace App\Providers;

use App\Policies\UserPolicy;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * 注册应用所有的认证/授权服务.
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
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
}
