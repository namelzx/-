<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/16
 * Time: 3:24 PM
 */

namespace app\api\controller\home;


use app\commonly\model\Banner as BannerModel;
use app\commonly\model\Bg;


class Banner extends Base
{
    /**
     * 获取轮播图数据
     */
    public function GetDataByBanner(){
        $data = input('param.');
        $res = BannerModel::GetDataByList($data);
        return json(msg(200, $res, '获取成功'));
    }
    /**
     *  获取背景图
     */
    public function GetDataByFind(){
        $data = input('param.');
        $res = Bg::where('type',$data['type'])->select();
        return json(msg(200, $res, '获取成功'));
    }

}