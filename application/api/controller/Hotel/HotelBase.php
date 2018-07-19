<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/18
 * Time: 下午10:28
 */

namespace app\api\controller\Hotel;


class HotelBase extends Base
{
    //获取数据列表
    public  function GetList()
    {
        $data = input('get.');
        $Model = new  HotelBaseM();
        $res = $Model;
        if (!empty($data['child_class'])) {
            $res = $res->where('child_class', $data['child_class']);
        }
        if (!empty($data['parent_class'])) {
            $res = $res->where('parent_class', $data['parent_class']);
        }
        if (!empty($data['info_name'])) {
            $res = $res->where('info_name', $data['info_name']);
        }
        $res = $res->order('child_class')->paginate($data['limit'], false, ['query' => $data['page'],]);
        return json($res);
    }

}