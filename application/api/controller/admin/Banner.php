<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/15
 * Time: 10:04 PM
 */

namespace app\api\controller\admin;

use app\commonly\model\Banner as BannerModel;

class Banner extends Base
{
    /**
     * 获取数据列表
     */
    public function GetDataByList()
    {
        $data = input('param.');
        $res = BannerModel::GetDataByList($data);
        return json(msg(200, $res, '获取成功'));
    }

    /**
     * 提交数据
     */
    public function PostDataByAdd()
    {
        $data = input('param.');
        $res = BannerModel::PostDataByAdd($data);
        return json(msg(200, $res, '提交成功'));
    }

    /**
     * 修改数据
     */
    public function PostDataByUpdate()
    {
        $data = input('param.');
        $res = BannerModel::PostDatByEdit($data);
        return json(msg(200, $res, '修改成功'));

    }

    /**
     * 修改状态
     */
    public function PostDataByStatus()
    {

        $data = input('param.');
        $res = BannerModel::PostDataByStatus($data);
        return json(msg(200, $res, '修改成功'));
    }

    /**
     * 删除数据
     */
    public function GetDataByDelete()
    {
        $data = input('param.');
        $res = BannerModel::GetDataByDelete($data['id']);
        return json(msg(200, $res, '删除成功'));

    }

}