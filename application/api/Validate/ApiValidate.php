<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/16
 * Time: 下午11:46
 */

namespace app\api\Validate;


class ApiValidate extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];
}