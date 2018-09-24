<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/19
 * Time: 下午12:16
 */

namespace app\commonly\model;


class UserWechat extends BaseModel
{
//    protected $table = 'leo_user_wechat';
    protected $autoWriteTimestamp = true;
    //    添加微信用户信息
    public static function PostWechatByData($data)
    {
        return self::create($data);

    }

}