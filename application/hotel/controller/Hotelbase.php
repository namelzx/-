<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/20
 * Time: 上午11:40
 */

namespace app\Hotel\controller;
use JWT\JWT;
use think\Controller;

class Hotelbase extends Controller
{
    public function test()
    {
        $key = "example_key";
        $token = array(
            "id" => "http://example.org",
            "token" => 1356999524,
        );
        $jwt = JWT::encode($token, $key);
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        print_r($decoded);

    }


}