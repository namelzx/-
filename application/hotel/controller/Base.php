<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/20
 * Time: 上午11:40
 */

namespace app\Hotel\Controller;



use think\Controller;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token");

class Base extends Controller
{


}