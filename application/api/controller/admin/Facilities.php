<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/28
 * Time: 下午4:36
 */

namespace app\api\controller\admin;

use app\commonly\model\Facilities as FacilitiesModel;

class Facilities extends Base
{
    public function getFacilitiesbyList()
    {

        $data = input('param.');
        $res = FacilitiesModel::getFacilitiesbylist($data);
        $ddata = [];

        foreach ($res as $k => $item) {
            $ddata[$k] = $res[$k];
            $red = db('facilities')->where('id', $res[$k]['parent_id'])->field('type_name')->find();
            $ddata[$k]['parent_name'] = $red['type_name'];
        }
        $total = db('facilities')->count();
        return json(['total' => $total, 'data' => $ddata]);
    }

    public function getFacilitiesbytype()
    {

        $res = FacilitiesModel::where('parent_id', 0)->select();
        return json($res);
    }

    public function postFacilitiesbyData()
    {
        $data = input('param.');
        $res = FacilitiesModel::PostDatabyAdd($data);
        return json($res);
    }

    /**
     * 删除分类
     */
    public function GetDataDelete()
    {
        $data=input('param.');
        $res=FacilitiesModel::GetDataByDelete($data['id']);
        return json(msg(200, $res, '删除成功'));
    }

    /**
     * @param $parent_id  父类id，根据父类id查询子类
     */
    public function getParentbyData($parent_id)
    {
        $res = FacilitiesModel::where('parent_id', $parent_id)->select();
        return json($res);
    }

}