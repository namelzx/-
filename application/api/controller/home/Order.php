<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/9/12
 * Time: 下午11:11
 */

namespace app\api\controller\home;


use app\commonly\model\HotelDemand;
use app\commonly\model\RoomOrder;
use app\commonly\model\RoomOrderRoom;

class Order extends Base
{
    public function postRoomOrderByData(){
        $data=input('param.');
        $data['create_time']=time();
        $res=RoomOrder::PostByData($data);
        HotelDemand::where('id',$data['demand_id'])->data(['status'=>1])->update();
        $OrderModel=new RoomOrderRoom();
         $dd=$OrderModel->strict(false)->insertAll($this->groupOrder($data['room'],$res->id));
        return json(msg(200,$dd,'1'));
    }
    /*
     * 根据用户id查询用户的信息
     */
    public function getRoomOrderByData($user_id){
            $res=RoomOrder::getOrderByData($user_id);
        return json($res);
    }
    /* 提交订单数据重装 */
    function groupOrder($visit, $id)
    {

        $visit_list = [];
        foreach ($visit as $v => $item) {
            $visit_list[$v] = $visit[$v];
            $visit_list[$v]['order_id'] = $id;
        }

        return $visit_list;
    }

}