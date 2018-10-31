<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/17
 * Time: 上午11:38
 */

namespace app\lib\exception;

//重写全局异常类
use think\exception\Handle;
use think\facade\Request;

class ExceptionHandler extends Handle
{

    private $code;
    private $msg;
    private $errorCode;
//
//    public function render(\Exception $e)
//    {
//
//        if ($e instanceof BaseException) {
//            //操作异常
//            $this->code = $e->code;
//            $this->msg = $e->msg;
//            $this->errorCode = $e->errorCode;
//        } else {
//            //内部异常
//            $this->code = 500;
//            $this->msg = "内部错误";
//            $this->errorCode = 999;
//        }
//        $result = [
//
//            'msg' => $this->msg,
//            'code' => $this->code,
//            'request_url' => Request::url()
//        ];
//        return json($result, $this->code);
//    }

}