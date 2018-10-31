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
use app\commonly\model\HotelRoom;
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
        return json(['total' => $res->total(), 'data' => $this->MatchingShopRoom($res, $data['shop_id'])]);

    }

    /*
   * 匹配商户房间信息房间价格
   */
    public function MatchingShopRoom($visit, $shop_id)
    {
        $result = [];

        $data = HotelRoom::where('user_id', $shop_id)->select();
        foreach ($visit as $key => &$value) {
            $result[$key] = $value;
            $result[$key]['items'] = $value['items'];
            for ($i = 0; $i < count($result[$key]['items']); $i++) {
                for ($x = 0; $x < count($data); $x++) {
                    if ($data[$x]['room_type'] == $result[$key]['items'][$i]->room_id) {
                        $result[$key]['items'][$i]->price = $data[$x]['price'];
                    }
                }
            }
        }
        return $result;
    }

    /*
     * 修改订单状态
     */
    public function SetOrderByStatus()
    {
        $data = input('param.');
        $res=RoomOrder::SetOrderByStatus( $data);
        return json($data);
    }

}