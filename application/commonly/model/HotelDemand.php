<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/9/7
 * Time: 下午11:56
 */

namespace app\commonly\model;


class HotelDemand extends BaseModel
{
    protected $hidden=['id'];
    //添加数据
    public static function PostByData($data)
    {
        $res=self::create($data);
        return $res->id;
    }
}