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
    public static function getOrderByData($id){
        $res=self::with('items')->with('info')->where('user_id',$id)->paginate();
        return $res;
    }
    public static function PostByData($data)
    {
        return self::create($data);
    }

}