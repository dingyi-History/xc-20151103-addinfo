<?php
/**
 * Created by PhpStorm.
 * User: dingyiming
 * Date: 15/11/8
 * Time: 上午3:01
 */
namespace App\Repositories;


use Illuminate\Support\ServiceProvider;

class BindInterfaceSerivePrivider extends ServiceProvider
{

    public function register()
    {
        //当你在controller层使用类型提示UserinfoRepositoryInterface,我们知道你将会使用UserinfoRepository.
        $this->app->bind('App\Repositories\UserinfoRepositoryInterface', 'App\Repositories\UserinfoRepository');

        $this->app->bind('App\Repositories\UserRepositoryInterface', 'App\Repositories\UserRepository');
    }
}