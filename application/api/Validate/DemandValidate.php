<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/9/8
 * Time: 上午12:10
 */

namespace app\api\Validate;


class DemandValidate extends BaseValidate
{
    protected $rule =   [
        'user_id'  => 'require|number',
        'low_price'=>'require',
        'max_price'=>'require',
//        'number'=>'require',

    ];
    protected $message  =   [
        'user_id.require' => '违反规则,注意封号',
        'low_price.require'=>'价格必填',
        'max_price.require'=>'价格必填',
//        'number.require'=>'数量必填'
    ];

}