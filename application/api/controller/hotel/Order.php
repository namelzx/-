<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/9/25
 * Time: 下午2:43
 */

namespace app\api\controller\hotel;


/*
 * 酒店订单后台
 */
use app\commonly\model\RoomOrder;

class Order extends Base
{
    /*
     * 获取订单
     */
    public function getOrderByData()
    {
        $data = input('param.');
        $res = RoomOrder::getHotelByOrder($data);
        return json(['total' => $res->total(), 'data' => $this->MatchingShopRoom($res)]);
    }

    /*
   * 匹配商户房间信息房间价格
   */
    public function MatchingShopRoom($visit)
    {
        $result = [];

        foreach ($visit as $key => &$value) {
            $result[$key] = $value;
            $pushroom = db('push_room')->where('demand_id', $result[$key]['demand_id'])->select();
            $result[$key]['items'] = $pushroom;
        }
        return $result;
    }

    /*
     * 修改订单状态
     */
    public function SetOrderByStatus()
    {
        $data = input('param.');
        $res = RoomOrder::SetOrderByStatus($data);
        return json($res);
    }

}