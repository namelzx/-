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
    Route::get('/login', 'api/admin.Login/logout');
    Route::get('user/info', 'api/admin.Login/info');
    // 配置类
    Route::get('/config/getFacilitiesbyList', 'api/admin.Facilities/getFacilitiesbyList'); //获取分类列表
    Route::get('/config/getFacilitiesbytype', 'api/admin.Facilities/getFacilitiesbytype'); //获取一级分类
    Route::get('/config/getParentbyData', 'api/admin.Facilities/getParentbyData'); //获取子类
    Route::post('/config/postFacilitiesbyData', 'api/admin.Facilities/postFacilitiesbyData'); //添加分类
    Route::get('/config/getRoombyList', 'api/admin.Facilities/GetDataDelete'); //添加分类


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
    Route::Post('hotel/createpwd', 'api/admin.hotel/create_password');//给用户生成账号密码
    /**
     *轮播模块
     */
    Route::get('banner/GetDataByList', 'api/admin.banner/GetDataByList'); //获取轮播图
    Route::post('banner/PostDataByAdd', 'api/admin.banner/PostDataByAdd');  //添加数据
    Route::post('banner/PostDataByUpdate', 'api/admin.banner/PostDataByUpdate');  //修改数据
    Route::post('banner/PostDataByStatus', 'api/admin.banner/PostDataByStatus');  //修改数据状态
    Route::get('banner/GetDataByDelete', 'api/admin.banner/GetDataByDelete'); //删除数据
    /**
     * 背景图
     */
    Route::get('bg/GetDataByList', 'api/admin.bg/GetDataByList'); //获取轮播图
    Route::post('bg/PostDataByAdd', 'api/admin.bg/PostDataByAdd');  //添加数据
    Route::post('bg/PostDataByUpdate', 'api/admin.bg/PostDataByUpdate');  //修改数据
    Route::post('bg/PostDataByStatus', 'api/admin.bg/PostDataByStatus');  //修改数据状态
    Route::get('bg/GetDataByDelete', 'api/admin.bg/GetDataByDelete'); //删除数据
});
/*
 * 酒店方后台管理路由
 */
Route::group('api/hotel', function () {
//    登录类
    Route::post('/login', 'api/hotel.Login/login');
    Route::get('/login', 'api/admin.Login/logout');//退出登陆
    Route::get('/user/info', 'api/hotel.Login/getUserInfo');
//    基础服务类
    Route::get('/GetFind', 'api/hotel.hotelbase/GetFind');
    Route::get('/ServerBySist', 'api/hotel.hotelbase/ServerBySist');
    Route::get('/roombase', 'api/hotel.hotelbase/roomBylist');
    Route::get('/getRoombyList', 'api/hotel.hotelbase/getRoombyList');
    Route::get('/roombyDel', 'api/hotel.hotelbase/roombyDel');
    Route::post('/setServer', 'api/hotel.hotelbase/setServer');
    Route::post('/update', 'api/hotel.hotelbase/update');
    Route::post('/PostRoombyAdd', 'api/hotel.hotelbase/PostRoombyAdd');
    Route::post('room/PostDataByUpdate', 'api/hotel.hotelbase/PostDataByUpdate');  //修改数据
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
//    获取获取信息
    Route::get('user/getUserByinfo', 'api/home.user/getUserByinfo');
//      登陆
    Route::post('user/login', 'api/home.user/login');
    /**
     *  获取轮播图
     */
    Route::get('banner', 'api/home.banner/GetDataByBanner');
    Route::get('bg', 'api/home.banner/GetDataByFind');


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
    Route::post('hotel/Demand_Push', 'api/home.hotel/Demand_Push');//提交报价
    Route::post('hotel/GetBisPush', 'api/home.hotel/GetBisPush');//获取商家报价
    Route::get('hotel/getRoomByInfo', 'api/home.roominfo/getRoomByInfo');//获取酒店详细信息
    Route::post('hotel/postRoomOrderByData', 'api/home.order/postRoomOrderByData');//提交订单




    /**
     * 会议室模块
     */
    Route::post('Meeting/postMeetingDemandByData', 'api/home.Meeting/postMeetingDemandByData');//添加酒店需求
    Route::get('Meeting/getMeetingRoomByInfo', 'api/home.meeting/getMeetingRoomByInfo');//获取会议室详细信息
    Route::post('Meeting/getMeetingBylist', 'api/home.meeting/getMeetingBylist');//获取符合需求信息列表
    Route::post('Meeting/PostMeetingOrderByData', 'api/home.meeting/PostMeetingOrderByData');//提交订单
    Route::post('Meeting/Demand_Push', 'api/home.meeting/Demand_Push');//提交报价


    /**
     * 订单模块
     */
    //客房订单
    Route::get('order/getRoomOrderByData', 'api/home.Order/getRoomOrderByData');
    Route::Post('order/SetOrderByStatus', 'api/home.Order/SetOrderByStatus');
    //会议室订单
    Route::get('order/getmeetingOrderByData', 'api/home.Order/getmeetingOrderByData');
    Route::Post('order/SetmeetingByStatus', 'api/home.Order/SetmeetingByStatus');

    //用户审核
    Route::get('user/GetList', 'api/admin.user/GetList');
    Route::post('user/setStatus', 'api/admin.user/setStatus');
    //酒店审核
    Route::get('hotel/GetList', 'api/admin.hotel/GetList');
    Route::post('hotel/setStatus', 'api/admin.hotel/setStatus');
});
return [

];
