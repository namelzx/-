<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/9/24
 * Time: 下午4:51
 */

namespace app\commonly\model;

/*
 * 房间订单表子表房间表
 */

class RoomOrderRoom extends BaseModel
{
    public static function PostByData($data)
    {
         
        return self::saveAll($data);
    }

}