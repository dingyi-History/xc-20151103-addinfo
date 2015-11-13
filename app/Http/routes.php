<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//默认访问
Route::get('/', ['middleware' => 'auth', function () {
    return redirect('userinfo');
}]);

//登录
Route::group(['prefix' => 'auth'], function () {
    get('login', 'Auth\AuthController@getLogin');
    post('login', 'Auth\AuthController@postLogin');
    get('logout', 'Auth\AuthController@getLogout');
});

//登录用户才能访问进行用户信息操作
Route::group(['middleware' => 'auth'], function () {
    resource('userinfo', 'UserinfosController');
    post('userinfo/search', 'UserinfosController@search');
    //修改密码
    get('/users/resetpwd', 'UsersController@showreset');
    post('/users/resetpwd', 'UsersController@updatereset');
});

//员工管理
Route::group(['middleware' => 'auth'], function () {
    resource('users', 'UsersController');
});

//dingo/api
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    Route::group(['prefix' => 'validate', 'namespace' => 'App\Api\Controllers'], function ($api) {
        get('onephone', 'ValidateController@onephone');
    });
});

//Oauth2登录
Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});