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
    public static function PostCertificationByData($data)
    {
        return self::create($data);
    }
    public static function PostUdateByData($data)
    {
        return self::where('user_id', $data['user_id'])->update($data);
    }
    public static function getBYinfo($user_id){
        return self::where('user_id',$user_id)->find();

    }

}