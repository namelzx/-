<?php

namespace app\index\controller;


use EasyWeChat\Factory;

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
            $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $config['appId'] . '&redirect_uri=' . urlencode($config['redirect_uri']) . '&response_type=code&scope=snsapi_userinfo&state=state#wechat_redirect';
            $this->redirect($url);
        }

    }

    public function index()
    {

        return view();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    // 用户授权成功的操作
    public function wxlogin()
    {
        // 当你设置微信回调网址设置为http://your domain/index/weixin/wxlogin时
        // 用户同意授权后，微信后台会访问该网站同时返回code参数
        $config = config('weixin');//获取微信相关配置
        dump($config);
//        $wechat = new \api\WxLogin($config);
//        if(isset($_GET['code'])){
//            // 通过code参数获取Access_Token
//            $token = $wechat ->get_access_token($_GET['code']);
//            // 通过code参数获取用户信息
//            $info = $wechat ->get_userinfo($token->access_token, $token->openid);
//            // $info即为已经获得的用户的信息，数据格式为对象形式。如获取用户的openid,获取方式为$info->openid。
//
//        }
    }

    public function mess()
    {
//        dump(config('eas'));
        $app=Factory::officialAccount(config('eas'));
        $data=$app->template_message->send([
            'touser' => 'oLI3b0WStkYG-A-Bnq1AHvGemEYE',
            'template_id' => 'dYEakhOSh1uBj7POA5By1ONpcrzPz8ju3bgDohMim60',
            'url' => 'https://easywechat.org',
            'data' => [
                'keyword1' => '1',
                'keyword2' => '2',
                'keyword3' => '3',
                'keyword4' => '2',
                'keyword5' => '3',
                'remark' => '3',
                ],
            ]);

        dump($data);


    }
}
