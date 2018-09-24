<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/24
 * Time: 下午12:49
 */

namespace app\api\controller\admin;

use app\api\model\HotelBaseM;
use app\commonly\model\HotelBasic as HotelBasicModel;


/**
 * Class Basis ->酒店基础设置项
 * @package app\api\controller\admin
 */
class Basis extends Base
{

    //获取数据列表
    public function GetList()
    {
        $data = input('get.');
        $res = HotelBasicModel::getHotelBasebylist($data);
        $ddata = [];
        foreach ($res as $k => $item) {
            $ddata[$k] = $res[$k];
            $parent_class = db('facilities')->where('id', $res[$k]['parent_class'])->field('type_name')->find();
            $child_class = db('facilities')->where('id', $res[$k]['child_class'])->field('type_name')->find();
            $ddata[$k]['parent_name'] = $parent_class['type_name'];
            $ddata[$k]['child_name'] = $child_class['type_name'];
        }
        return json(['total' => $res, 'data' => $ddata]);
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