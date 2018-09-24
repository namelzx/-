<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/9/3
 * Time: 下午12:57
 */

namespace app\commonly\model;


class HotelRoom extends  BaseModel
{
    protected $field = true;

    public static function PostByData($data)
    {
        return self::create($data);
    }

}