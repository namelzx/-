<?php
/**
 * Created by PhpStorm.
 * User: lzx
 * Date: 2018/4/9
 * Time: 14:14
 */

namespace app\index\controller;


use think\Controller;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token");

class Base extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session('user_id', 1);
    }
}