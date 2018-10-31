<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/9/12
 * Time: 下午11:11
 */

namespace app\commonly\model;


class RoomOrder extends BaseModel
{
    public function items()
    {
        return $this->hasMany('RoomOrderRoom', 'order_id', 'id');
    }

    public function info()
    {
        return $this->hasOne('Bis', 'user_id', 'user_id');
    }

    public static function getOrderByData($data)
    {
        $res = self::with('items')->
        with('info')->
        where($data)->order('create_time desc')->paginate();

        return $res;
    }

    public static function PostByData($data)
    {
        return self::create($data);
    }

    /*
     * 酒店后台订单
     */
    public static function getHotelByOrder($data)
    {
        $res = self::with('items')->where('user_id', $data['shop_id'])
            ->paginate($data['limit'], false, ['query' => $data['page'],]);
        return $res;
    }

    /*
    * 修改订单状态
    */
    public static function SetOrderByStatus($data)
    {
        $res = self::where('id', $data['id'])->data(['status' => $data['status']])->update();
        return $res;
    }

}