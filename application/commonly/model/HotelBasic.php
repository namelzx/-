<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/29
 * Time: 上午12:06
 */

namespace app\commonly\model;


class HotelBasic extends BaseModel
{
    protected $autoWriteTimestamp = true;
    public static function getHotelBasebylist($data){
        $res=self::order('parent_class','asc')->order('child_class','asc');
        if(!empty($data['parent_class'])){
            $res=$res->where('parent_class',$data['parent_class']);
        }
        if(!empty($data['child_class'])){
            $res=$res->where('child_class',$data['child_class']);
        }
        if(!empty($data['type'])){
            $res=$res->where('type',$data['type']);
        }
        $res=$res->paginate($data['limit'], false, ['query' => $data['page'],]);
        return $res;
    }
}