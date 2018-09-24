<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/25
 * Time: 下午10:35
 */

namespace app\api\controller;


class Map
{
    public function Tencent_Map_Inverse_Analysis($latitude,$longitude){
//        $key='OB4BZ-D4W3U-B7VVO-4PJWW-6TKDJ-WPB77';
//        $result = json_decode(file_get_contents($url="http://apis.map.qq.com/ws/geocoder/v1/?location=".$latitude.",".$longitude."&key=".$key),true);
        $result=json_decode(file_get_contents($url="https://apis.map.qq.com/ws/geocoder/v1/?location=".$latitude.",".$longitude."&get_poi=1&key=IYOBZ-HZ5CW-DMMRV-O6DNH-FKUTF-OFBVF"));
        return json($result);
    }

}