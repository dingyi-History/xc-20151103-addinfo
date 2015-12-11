<?php
//默认访问
Route::get('/', ['middleware' => 'auth', function () {
    return view('index');
}]);

//登录
Route::group(['prefix' => 'auth'], function () {
    get('login', 'Auth\AuthController@getLogin');
    post('login', 'Auth\AuthController@postLogin');
    get('logout', 'Auth\AuthController@getLogout');
});

//登录员工才能访问进行用户信息操作
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

//对录入的用户添加行为记录
Route::group(['middleware' => 'auth'],function(){
    resource('do','DolistController', ['except' => 'show']);
});

//标签
Route::group(['prefix' => 'tag','middleware' => 'auth'],function(){
    get('index','TaglistController@index');
    get('show/{id}','TaglistController@show');
    post('store','TaglistController@store');
});

//dingo/api
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('onephone/{params}', 'ValidController@onephone');
        $api->get('oneidentity/{params}', 'ValidController@oneidentity');
        $api->get('taglist','TagController@taglist');
        $api->post('addtag','TagController@addtag');
    });
});

//Oauth2登录
Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

Route::get('excel/export','ExcelController@export');
Route::get('excel/import','ExcelController@import');




