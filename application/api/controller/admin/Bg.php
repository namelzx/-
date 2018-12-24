<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/16
 * Time: 2:23 PM
 */

namespace app\api\controller\admin;

use app\commonly\model\Bg as BgModel;


class Bg extends Base
{
    /**
     * 获取数据列表
     */
    public function GetDataByList()
    {
        $data = input('param.');
        $res = BgModel::GetDataByList($data);
        return json(msg(200, $res, '获取成功'));
    }

    /**
     * 提交数据
     */
    public function PostDataByAdd()
    {
        $data = input('param.');
        $res = BgModel::PostDataByAdd($data);
        return json(msg(200, $res, '提交成功'));
    }

    /**
     * 修改数据
     */
    public function PostDataByUpdate()
    {
        $data = input('param.');
        $res = BgModel::PostDatByEdit($data);
        return json(msg(200, $res, '修改成功'));

    }

    /**
     * 修改状态
     */
    public function PostDataByStatus()
    {

        $data = input('param.');
        $res = BgModel::PostDataByStatus($data);
        return json(msg(200, $res, '修改成功'));
    }

    /**
     * 删除数据
     */
    public function GetDataByDelete()
    {
        $data = input('param.');
        $res = BgModel::GetDataByDelete($data['id']);
        return json(msg(200, $res, '删除成功'));

    }

}