<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/20
 * Time: 下午5:24
 */

namespace app\api\model;


class UserWechat extends BaseModel
{
    protected $autoWriteTimestamp = true;
    public function items()
    {
        return $this->hasMany('User', 'id', 'user_id');
    }
    public static function getUserbyInfo($openid)
    {
        $info=self::with('items')
            ->where('openid',$openid)
            ->find();
        return $info;

    }

}