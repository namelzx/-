<?php

namespace app\index\controller;


use api\WxLogin;

class Index extends Base
{

    public function login()
    {


        $config = config('weixin');//获取微信相关配置
        $wechat = new \api\WxLogin($config);

        if (isset($_GET['code'])) {

            // 通过code参数获取Access_Token
            $token = $wechat->get_access_token($_GET['code']);
            // 通过code参数获取用户信息

            dump($token->access_token);
            $info = $wechat->get_userinfo($token->access_token, $token->openid);
            session('wx_user_info', $info);
            $this->redirect('user/index');

            // $info即为已经获得的用户的信息，数据格式为对象形式。如获取用户的openid,获取方式为$info->openid。
            //你的操作
        } else {

            $redirect_uri = urlencode("http://127.0.0.1/l/public/index/index/login");//这里的地址需要http://
            $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' .  $config['appId'] . '&redirect_uri=' . urlencode($config['redirect_uri']) . '&response_type=code&scope=snsapi_userinfo&state=state#wechat_redirect';
            $this->redirect($url);
        }

    }

    public function index()
    {
//        $wxlogin = new WxLogin();


        return view();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
