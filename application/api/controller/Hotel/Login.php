<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/16
 * Time: 上午12:30
 */

namespace app\api\controller\Hotel;

use app\commonly\model\BisUser;
use think\Db;

class Login extends Base
{
    public function login()
    {
        $data = input('post.');
        if ($this->request->isPost()){
            $userModel = new BisUser();
            $hasUser = Db::table('leo_bis')->alias('b')
                ->join('leo_bis_user u','b.id=u.bis_id')
                ->where('b.phone',$data['username'])
                ->find();

            if (empty($hasUser)) {
                return json(logomsg(0, '', '', '管理员不存在'));
            }
            if ($data['password'] != $hasUser['password']) {
                return json(logomsg(0, '', $data, '密码错误'));
            }
            if (1 != $hasUser['status']) {

                return json(logomsg(0, '', '', '该账号被禁用'));

            }

            return json(logomsg(1, 'admin', url('index/index'), '登录成功'));
        } else {
            return json(logomsg(0, '', '', '登录失败'));
        }
    }

}