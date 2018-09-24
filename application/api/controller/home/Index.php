<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/4
 * Time: 下午4:57
 */

namespace app\api\controller\home;


use app\api\model\User;
use app\api\Validate\ApiValidate;
use app\lib\exception\HomeMissException;

class Index extends Base
{
    public function GetDataByList()
    {
        $res = db('bis')->select();
        return json($res);
    }
    public function test($id)
    {
        (new ApiValidate())->goCheck();

        $userModel = new User();
        $userinfo = $userModel->getUserbyInfo($id);
        if (!$userinfo) {
            $e = new HomeMissException();
            throw  $e;
        }
        return $userinfo;
    }

}