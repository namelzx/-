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

Route::get('hello/:name', 'api/images/upload');


//后台管理酒店路由
Route::group('api/admin/', function () {
    // 登录类
    Route::post('/login', 'api/admin.Login/login');
    // 配置类
    Route::get('/config/getFacilitiesbyList', 'api/admin.Facilities/getFacilitiesbyList'); //获取分类列表
    Route::get('/config/getFacilitiesbytype', 'api/admin.Facilities/getFacilitiesbytype'); //获取一级分类
    Route::get('/config/getParentbyData', 'api/admin.Facilities/getParentbyData'); //获取子类
    Route::post('/config/postFacilitiesbyData', 'api/admin.Facilities/postFacilitiesbyData'); //添加分类
    //基础服务类
    Route::get('base/delete', 'api/admin.Basis/delete');
    Route::get('base/GetList', 'api/admin.Basis/GetList');
    Route::post('base/create', 'api/admin.Basis/create');
    Route::post('base/update', 'api/admin.Basis/update');
    //旅行社审核



    Route::get('certification/GetList', 'api/admin.certification/GetList');
    Route::post('Certification/setStatus', 'api/admin.certification/setStatus');
    Route::get('certification/GetHotelList', 'api/admin.certification/GetHotelList');
    Route::post('Certification/setHotelStatus', 'api/admin.certification/setHotelStatus');
    //酒店审核
    Route::get('hotel/GetList', 'api/admin.hotel/GetList');
    Route::post('hotel/setStatus', 'api/admin.hotel/setStatus');
    Route::get('hotel/createpwd', 'api/admin.hotel/create_password');//给用户生成账号密码
});
/*
 * 酒店方后台管理路由
 */
Route::group('api/hotel', function () {
//    登录类
    Route::post('/login', 'api/hotel.Login/login');
//    基础服务类
    Route::get('hotel/GetFind', 'api/hotel.Hotelbase/GetFind');
    Route::get('hotel/ServerBySist', 'api/Hotel.HotelBase/ServerBySist');
    Route::get('hotel/roombase', 'api/Hotel.HotelBase/roomBylist');
    Route::get('hotel/getRoombyList', 'api/Hotel.HotelBase/getRoombyList');
    Route::get('hotel/roombyDel', 'api/Hotel.HotelBase/roombyDel');
    Route::post('hotel/setServer', 'api/Hotel.HotelBase/setServer');
    Route::post('hotel/update', 'api/Hotel.HotelBase/update');
    Route::post('hotel/PostRoombyAdd', 'api/Hotel.HotelBase/PostRoombyAdd');
//工具类
    Route::post('hotel/upload', 'api/hotel.hotelBase/upload');

    //酒店订单
    Route::get('hotel/order/getOrderByData', 'api/hotel.order/getOrderByData');
    Route::post('hotel/order/SetOrderByStatus', 'api/hotel.order/SetOrderByStatus');



});
/**
 * 用户模块路由
 */
Route::group('api/home/', function () {
//    获取

    Route::get('user/getUserByinfo', 'api/home.user/getUserByinfo');

    Route::get('user/login', 'api/home.user/login');

    Route::post('user/update', 'api/home.user/upload');
    Route::post('user/setbyCertification', 'api/home.user/setUserbyCertification');//旅行社认证
    Route::get('user/getUserbyCertification', 'api/home.user/getUserbyCertification');//获取认证信息
    Route::post('user/setbyHotelCertification', 'api/home.user/setHotelUserbyCertification');//酒店认证
    Route::get('user/gethotelbyCertification', 'api/home.user/gethotelbyCertification');//获取认证信息
    Route::post('user/setUserbyInfo', 'api/home.user/setUserbyInfo');
    Route::get('user/UserbyInfo', 'api/home.user/UserbyInfo');
//    发布模块
    Route::get('hotel/getRoombyList', 'api/home.hotel/getRoombyList'); //获取发布分类
    Route::post('hotel/postHotelDemandByData', 'api/home.hotel/postHotelDemandByData');//添加酒店需求
    Route::get('hotel/getHotelRoomByInfo', 'api/home.hotel/getHotelRoomByInfo');//获取需求信息
    Route::post('hotel/getHotelBylist', 'api/home.hotel/getHotelBylist');//获取符合需求信息列表
    Route::get('hotel/getRoomByInfo', 'api/home.roominfo/getRoomByInfo');//获取酒店详细信息
    Route::post('hotel/postRoomOrderByData', 'api/home.Order/postRoomOrderByData');//获取符合需求信息列表

    //订单模块
    Route::get('order/getRoomOrderByData', 'api/home.Order/getRoomOrderByData');
    Route::Post('order/SetOrderByStatus', 'api/home.Order/SetOrderByStatus');

//    用户审核
    Route::get('user/GetList', 'api/admin.user/GetList');
    Route::post('user/setStatus', 'api/admin.user/setStatus');
//   酒店审核
    Route::get('hotel/GetList', 'api/admin.hotel/GetList');
    Route::post('hotel/setStatus', 'api/admin.hotel/setStatus');
});
return [

];
