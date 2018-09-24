<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/17
 * Time: 上午11:42
 */

namespace app\lib\exception;


use think\Exception;

class HomeMissException extends BaseException
{
//    状态码
    public $code = 404;
//    错误信息
    public $msg = '数据不存在';
//    自定义错误码
    public $errorCode = 40001;
}