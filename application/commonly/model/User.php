<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/12
 * Time: 下午3:11
 */

namespace app\commonly\model;


class User extends BaseModel
{
    public function items()
    {
        return $this->hasOne('Certification','user_id');
    }
    public static function getUserBylist(){
        $res=self::
        withJoin('items')->select();
        return $res;

    }
    public static function PostUpdateByData($data)
    {
        return self::where('id',$data['id'])->update($data);
    }


}