<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/5/22
 * Time: 下午12:11
 */

namespace app\api\controller;


use think\Controller;
use think\Request;
use think\File;
use think\Image;

class Testpai extends controller
{
    public function indexnew(){
       
        //获得参数 signature nonce token timestamp echostr
         //获得参数 signature nonce token timestamp echostr
         $nonce     =input('param.nonce');
         $token     = 'daliuren';
         $timestamp =input('param.timestamp');
         $echostr   =input('param.echostr');
         $signature =input('param.signature');
         //形成数组，然后按字典序排序
         $array = array();
         $array = array($nonce, $timestamp, $token);
         sort($array);
         //拼接成字符串,sha1加密 ，然后与signature进行校验
         $str = sha1( implode( $array ) );
        
         if( $str  == $signature && $echostr ){
             //第一次接入weixin api接口的时候
             echo  $echostr;
           
             exit;
         }else{
           
             $this->reponseMsg();
         }

    }
   
    public function reponseMsg(){
        //1.获取到微信推送过来post数据（xml格式）
     
        header("Content-type: text/html; charset=utf-8");
        $postArr = file_get_contents("php://input");
       
       
        $postObj = simplexml_load_string( $postArr );
      
        if( strtolower( $postObj->MsgType) == 'event'){
            //如果是关注 subscribe 事件
            if( strtolower($postObj->Event == 'subscribe') ){
                //回复用户消息(纯文本格式)
                $toUser   = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time     = time();
                $msgType  =  'text';
                $content  = '欢迎关注我们的微信公众账号'.$postObj->FromUserName.'-'.$postObj->ToUserName;
                $template = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            </xml>";
                $info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
                echo $info;
            
            }
        }
      $contnet="";
        if (strtolower( $postObj->MsgType ) == 'text') {
          
            switch (trim($postObj->Content )) {
                case '电影':
                    $contnet = '最近都没有看过什么电影，真的是没有什么时间啊。';
                    break;
                case '菜':
                    $contnet = '最喜欢吃红烧肉了，真心不喜欢那些都是骨头和皮没有肉的荤菜。';
                    break;
                case '饮料':
                    $contnet = '柠檬水，我感觉我对柠檬水上瘾了。';
                    break;
                default:
                    $contnet = '这不是我们设置的关键字，你再看看？';
                    break;
            }
            $toUser = $postObj->FromUserName;
            $fromUser = $postObj->ToUserName;
            $time = time();
            $msgType = 'text';
            $template = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        </xml>";
            $info = sprintf($template, $toUser, $fromUser, $time, $msgType, $contnet);
            echo $info;
        }
    }
}