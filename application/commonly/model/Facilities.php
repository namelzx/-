<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/28
 * Time: 下午4:35
 */

namespace app\commonly\model;


class Facilities extends BaseModel
{

    protected $autoWriteTimestamp = true;

    public static function PostDatabyAdd($data)
    {
        $res=self::create($data);
        return $res;
    }

    public static function getFacilitiesbylist($data){
        $res=self::where('id','neq',0)
            ->paginate($data['limit'], false, ['query' => $data['page'],]);
        return $res;
    }
    /**
     * 删除数据
     */
    public static function GetDataByDelete($id)
    {
        $res = self::where('id', $id)->delete();
        return $res;
    }

}