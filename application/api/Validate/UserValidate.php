<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/11/2
 * Time: 5:20 PM
 */

namespace app\api\Validate;


class UserValidate extends BaseValidate
{
    protected $rule = [
        'username' => 'require',
        'phone' => 'mobile',
        'email' => 'require|email',
    ];
    protected $message = [
        'username' => '姓名不可为空',
        'phone' => '手机格式错误',
        'email' => '邮箱格式错误'
    ];

}