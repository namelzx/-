<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/24
 * Time: 6:04 PM
 */

namespace app\api\controller\hotel;


use app\commonly\model\MeetingOrder;

class Meeting extends Base
{

    /*
  * 获取订单
  */
    public function getMeetingByData()
    {
        $data = input('param.');
        $res = MeetingOrder::getMeetingByOrder($data);
        return json($res);
    }

    /*
   * 修改订单状态
   */
    public function SetOrderByStatus()
    {
        $data = input('param.');
        $res = MeetingOrder::SetOrderByStatus($data);
        return json($res);
    }
}