<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/31
 * Time: 上午11:26
 */

namespace app\commonly\model;

/*
 * 酒店认证表
 */
class HotelCertification extends BaseModel
{
    protected $field = true;
    public function items()
    {
        return $this->hasOne('bis', 'user_id', 'user_id');
    }
    public static function PostCertificationByData($data)
    {
        return self::allowField(true)->create($data);
    }
    public static function PostUdateByData($data)
    {
        return self::where('user_id', $data['user_id'])->allowField(true)->update($data);
    }

    public static function getBYinfo($user_id){
        return self::with('items')->where('user_id',$user_id)->find();

    }

}