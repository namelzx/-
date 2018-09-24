<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/17
 * Time: 上午11:40
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{

//    状态码
    public $code = 400;
//    错误信息
    public $msg = '参数错误';
//    自定义错误码
    public $errorCode = 10000;
}