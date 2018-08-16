<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/4
 * Time: 下午4:57
 */

namespace app\api\controller\Home;


class Index extends Base
{
    public function GetDataByList()
    {
        $res = db('bis')->select();
        return json($res);
    }

}