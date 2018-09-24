<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/20
 * Time: 上午11:58
 */

namespace app\api\Validate;


class LoginValidate extends BaseValidate
{

    protected $rule =   [
        'username'  => 'require|max:25',
        'password'   => 'require|max:25',
    ];
    protected $message=[
        'username.require'=>'请填写商户账号',
        'password.require'=>'请填写商户密码'
    ];


}