<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2018/4/9
 * Time: 14:14
 */

namespace app\index\controller;


use think\Controller;

class Base extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session('user_id', 1);
    }
}