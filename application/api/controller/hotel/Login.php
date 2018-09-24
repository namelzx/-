<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/16
 * Time: 上午12:30
 */

namespace app\api\controller\hotel;

use app\api\Validate\LoginValidate;
use app\commonly\model\BisUser;
use think\Db;
use \JWT\JWT;

class Login extends Base
{
    public function login()
    {
        (new LoginValidate())->goCheck();

        $data = input('post.');

        if ($this->request->isPost()){
            $userModel = new BisUser();
            $hasUser = Db::table('leo_user')->alias('u')
                ->join('leo_bis_user b','u.id=b.user_id')
                ->where('u.phone',$data['username'])
                ->find();
            if (empty($hasUser)) {
                return json(logomsg(0, '', '', '管理员不存在'),'200');
            }
            if ($data['password'] != $hasUser['password']) {
                return json(logomsg(0, '', $data, '密码错误'));
            }
            if (1 != $hasUser['status']) {
                return json(logomsg(0, '', '', '该账号被禁用'));
            }
            $key = "2";
            $jwt=JWT::encode($hasUser['user_id'],$key);
            $decoded = JWT::decode($jwt, $key, array('HS256'));
//            session('bis_user',$hasUser);
            return json(logomsg(1,'admin', $decoded, '登录成功'));
        } else {
            return json(logomsg(0, '', '', '登录失败'));
        }
    }

}