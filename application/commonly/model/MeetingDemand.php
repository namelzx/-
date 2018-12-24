<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/20
 * Time: 9:37 PM
 */

namespace app\commonly\model;


class MeetingDemand extends BaseModel
{
    protected $hidden=['id'];
    //添加数据
    public static function PostByData($data)
    {
        $res=self::create($data);
        return $res->id;
    }

}