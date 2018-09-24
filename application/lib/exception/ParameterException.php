<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/17
 * Time: 下午12:35
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{

    public $code = 208;
    public $errorCode = 10000;
    public $msg = "参数错误";
}