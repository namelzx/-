<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/11
 * Time: 下午3:31
 */

namespace app\api\controller\admin;


use app\api\model\HotelBaseM;

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
     /*
      * 添加数据
      */
    public function create()
    {
        $data = input('post.');
        if (!empty($data)) {
            $Model = new HotelBaseM();
            $res = $Model::create($data);
            return json(msg(1, $res->id, '添加成功'));
        }
    }

    /*
     * 删除数据
     */
    public function delete()
    {
        $data = input('get.');
        if (!empty($data)) {
            $Model = new HotelBaseM();
            $res = $Model::destroy($data['id']);
            return json(msg(1, $res, '删除成功'));
        }
    }
    /*
     * 更新数据
     */
    public function update()
    {
        $data = input('post.');

        if (!empty($data)) {
            $postData['info_name'] = $data['info_name'];
            $postData['parent_class'] = $data['parent_class'];
            $postData['child_class'] = $data['child_class'];
            $Model = new HotelBaseM();
            $res = $Model::where('id', $data['id'])->update($postData);
            return json(msg(1, $res, '更新成功'));
        }
    }
}