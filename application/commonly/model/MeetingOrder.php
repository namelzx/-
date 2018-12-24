<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/22
 * Time: 12:07 PM
 */

namespace app\commonly\model;


class MeetingOrder extends BaseModel
{

    public function info()
    {
        return $this->hasOne('Bis', 'user_id', 'shop_id');
    }


    public static function PostByData($data)
    {
        return self::create($data);
    }

    public static function getOrderByData($data)
    {
        $res = self::with('info')->
        where('user_id',$data['user_id']);
        if(!empty($data['status'])){
            $res=$res->where('status',$data['status']);
        }
        $res=$res->order('create_time desc')->paginate($data['limit'], false, ['query' => $data['page'],]);
        return $res;
    }
    /**
    * 修改订单状态
    */
    public static function SetOrderByStatus($data)
    {
        if($data['status']==1){
            $data['status']=0;
        }elseif ($data['status']==3){
            $data['status']=4;
        }
        $res = self::where('id', $data['id'])->data(['status' => $data['status']])->update();
        return $res;
    }
}