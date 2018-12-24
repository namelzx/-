<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/11
 * Time: 下午4:18
 */

namespace app\api\controller\admin;


use app\api\model\LoginAdmin;


class Login extends Base
{

    public function login()
    {
        $data = input('post.');
        if ($this->request->isPost()) {
            $userModel = new LoginAdmin();
            $hasUser = $userModel->where('username', $data['username'])->find();
            if (empty($hasUser)) {
                return json(logomsg(500, '', '', '管理员不存在'));
            }
            if ($data['password'] != $hasUser['password']) {
                return json(logomsg(500, '', '', '密码错误'));
            }
            if (1 != $hasUser['status']) {
                return json(logomsg(500, '', '', '该账号被禁用'));
            }
            return json(logomsg(200, 'admin', url('index/index'), '登录成功'));
        } else {
            return json(logomsg(500, '', '', '登录失败'));
        }
    }

    public function info()
    {
        $data = input('param.');
        $res = LoginAdmin::where('roles', $data['token'])->find();
        return json(logomsg(200,$res['roles'] , $res,'获取用户信息成功'));
    }
    /*
 * 退出登陆
 */
    public function logout()
    {
        return json('success');
    }

}