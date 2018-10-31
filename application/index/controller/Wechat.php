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
        $config = config('weixin');//获取微信相关配置
        $wechat = new \api\WxLogin($config);
        if (isset($_GET['code'])) {
            // 通过code参数获取Access_Token
            $token = $wechat->get_access_token($_GET['code']);
            // 通过code参数获取用户信息
            $info = $wechat->get_userinfo($token->access_token, $token->openid);
            $wx_user = $info;

            $wx_user_info = UserWechat::where('openid', $wx_user->openid)->find();

            // 如果第一次登录那么进行用户信息添加
            if (empty($wx_user_info)) {
                $UserModel = new UserModel();
                $res = $UserModel->insertGetId([
                    'role' => 1,//默认添加用户角色用普通用户
                    'headimgurl' => $wx_user->headimgurl,
                ]);

                $userData = [
                    'openid' => $wx_user->openid,
                    'nickname' => $wx_user->nickname,
                    'sex' => $wx_user->nickname,
                    'headimgurl' => $wx_user->headimgurl,
                    'user_id' => $res,
                ];
                UserWechat::PostWechatByData($userData);
            }
            // $info即为已经获得的用户的信息，数据格式为对象形式。如获取用户的openid,获取方式为$info->openid。
//            $url = "http://localhost:8080/?id=" . $wx_user_info->openid;
            $url = "http://ya.10huisp.com/?id=".$wx_user_info->openid;


            $this->redirect($url);
        } else {
            $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $config['appId'] . '&redirect_uri=' . urlencode($config['redirect_uri']) . '&response_type=code&scope=snsapi_userinfo&state=state#wechat_redirect';

            $this->redirect($url);
        }
    }
}