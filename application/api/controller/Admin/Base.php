<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/12
 * Time: 下午4:23
 */

namespace app\api\controller\Admin;


use think\Controller;


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token");

class Base extends Controller
{

        public function __construct()
        {
            parent::__construct();
            $user_info=session('user');
            if(empty($user_info)){
                return "跳转登录";
            }
        }
}