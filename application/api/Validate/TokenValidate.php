<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/22
 * Time: 上午10:39
 */

namespace app\api\Validate;


class TokenValidate extends BaseValidate
{
    protected $rule =   [
        'id'  => 'require|number',
    ];
    protected $message  =   [
        'id.number' => '违反规则,注意封号',

    ];

}