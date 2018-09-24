<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/9/12
 * Time: 下午8:55
 */

namespace app\api\controller\home;

use app\commonly\model\HotelRoom;

class Roominfo extends Base
{
    /*
     * 获取房间信息
     */
    public function getRoomByInfo($id){
        $res=HotelRoom::get($id);
        return json($res);

    }

}