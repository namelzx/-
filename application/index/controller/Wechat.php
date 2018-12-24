<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/18
 * Time: 下午11:48
 */

namespace app\index\controller;


use app\commonly\model\User as UserModel;
use app\commonly\model\UserWechat;
use EasyWeChat\Factory;
use think\Controller;


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token");

class Wechat extends Controller
{
    // 用户授权成功的操作
    public function wxlogin()
    {
        $config = config('eas');//获取微信相关配置
        $app = Factory::officialAccount($config);

        $oauth = $app->oauth;
        // 未登录
        if (empty($_SESSION['wechat_user'])) {
            $_SESSION['target_url'] = 'user/profile';
            return $oauth->redirect();
        }
        // 已经登录过
        $user = $_SESSION['wechat_user'];

    }

    public function registered()
    {
        $config = config('eas');//获取微信相关配置
        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;
        $user = $oauth->user();
        $wx_user_info = UserWechat::where('openid', $user->id)->find();
        // 如果第一次登录那么进行用户信息添加
        if (empty($wx_user_info)) {
            $UserModel = new UserModel();
            $res = $UserModel->insertGetId([
                'role' => 1,//默认添加用户角色用普通用户
                'headimgurl' => $user->avatar,
            ]);
            $userData = [
                'openid' => $user->id,
                'nickname' => $user->nickname,
                'sex' => $user->sex,
                'headimgurl' => $user->avatar,
                'user_id' => $res,
            ];
            UserWechat::PostWechatByData($userData);
            $url = "http://localhost:8080/#/?user_id=".$res;
            $this->redirect($url);
        }
        $url = "http://localhost:8080/#/?user_id=".$wx_user_info->user_id;
        $this->redirect($url);
    }
}