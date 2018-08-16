<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');


//后台管理酒店路由
Route::group('api/admin/',function(){
    //    登录类
    Route::post('/login', 'api/admin.Login/login');
//    基础服务类
    Route::get('base/delete', 'api/admin.HotelBase/delete');
    Route::get('base/GetList', 'api/admin.HotelBase/GetList');
    Route::post('base/create',  'api/admin.HotelBase/create');
    Route::post('base/update',  'api/admin.HotelBase/update');
//    用户审核
    Route::get('user/GetList', 'api/admin.user/GetList');
    Route::post('user/setStatus', 'api/admin.user/setStatus');
//   酒店审核
    Route::get('hotel/GetList', 'api/admin.hotel/GetList');
    Route::post('hotel/setStatus', 'api/admin.hotel/setStatus');
    Route::get('hotel/createpwd', 'api/admin.hotel/create_password');//给用户生成账号密码
});
/*
 * 酒店方后台管理路由
 */
Route::group('api/hotel/',function(){
//    登录类
    Route::post('/login', 'api/hotel.Login/login');
//    基础服务类
    Route::get('hotel/GetFind', 'api/hotel.HotelBase/GetFind');
    Route::get('hotel/ServerBySist', 'api/hotel.HotelBase/ServerBySist');
    Route::post('hotel/setServer', 'api/hotel.HotelBase/setServer');

//    用户审核
    Route::get('user/GetList', 'api/admin.user/GetList');
    Route::post('user/setStatus', 'api/admin.user/setStatus');
//   酒店审核
    Route::get('hotel/GetList', 'api/admin.hotel/GetList');
    Route::post('hotel/setStatus', 'api/admin.hotel/setStatus');
});
/**
 * 用户模块路由
 */
Route::group('api/home/',function(){
//    获取
    Route::get('/getdata', 'api/home.index/GetDataByList');
//    基础服务类
    Route::get('hotel/GetFind', 'api/hotel.HotelBase/GetFind');
    Route::post('hotel/update', 'api/hotel.HotelBase/update');
    Route::post('hotel/facilitiesList',  'api/hotel.HotelBase/facilitiesList');
    Route::post('base/update',  'api/admin.HotelBase/update');
//    用户审核
    Route::get('user/GetList', 'api/admin.user/GetList');
    Route::post('user/setStatus', 'api/admin.user/setStatus');
//   酒店审核
    Route::get('hotel/GetList', 'api/admin.hotel/GetList');
    Route::post('hotel/setStatus', 'api/admin.hotel/setStatus');
});
return [

];
