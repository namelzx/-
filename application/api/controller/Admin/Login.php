<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/11
 * Time: 下午4:18
 */

namespace app\api\controller\Admin;


use app\api\model\LoginAdmin;


class Login extends Base
{

    public function login()
    {

        $data = input('post.');
        if ($this->request->isPost()){
            $userModel = new LoginAdmin();
            $hasUser = $userModel->where('username', $data['username'])->find();
            if (empty($hasUser)) {
                return json(logomsg(0, '', '', '管理员不存在'));
            }
            if (newMd5($data['password']) != $hasUser['password']) {
                return json(logomsg(0, '', '', '密码错误'));
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