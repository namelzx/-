<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/15
 * Time: 9:21 PM
 */

namespace app\commonly\model;


class Banner extends BaseModel
{
    public static function GetDataByList($data)
    {
        $res = self::where('status', 'neq', 0);
        if (!empty($data['status'])) {
            $res = $res->where('status', $data['status']);
        }
        if (!empty($data['title'])) {
            $res = $res->where('name', $data['title']);
        }
        $res = $res->order('id desc')->paginate($data['limit'], false, ['query' => $data['page'],]);
        return $res;
    }

    /**
     *添加数据
     */
    public static function PostDataByAdd($data)
    {
        $data['create_time'] = time();
        $res = self::insertGetId($data);
        return $res;
    }

    /**
     * 修改数据
     */
    public static function PostDatByEdit($data)
    {
        $res = self::where('id', $data['id'])->data($data)->update();
        return $res;
    }

    /**
     * 查看数据
     */
    public static function GetDataByFind($id)
    {

        $res = self::get($id);
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

    /**
     * @param $data
     */
    public static function PostDataByStatus($data)
    {
        $res = self::where('id', $data['id'])->data($data)->update();
        return $res;
    }

}