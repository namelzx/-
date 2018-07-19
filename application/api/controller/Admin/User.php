<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/12
 * Time: 下午4:23
 */

namespace app\api\controller\Admin;

use app\api\model\User as UserModel;


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token");

class User extends Base
{
    public function GetList()
    {
        $data = input('get.');
        $Model = new  UserModel();
        $res = $Model;
        if (!empty($data['username'])) {
            $res = $res->where('username', $data['username']);
        }
        if (!empty($data['status'])) {
            if ($data['status'] == 2) {
                $res = $res->where('status', 0);
            } else {
                $res = $res->where('status', $data['status']);
            }
        }
        $res = $res->paginate($data['limit'], false, ['query' => $data['page'],]);
        return json($res);
    }

    public function setStatus()
    {
        $data['id'] = input('post.id');
        $data['status'] = input('post.status');
        if (!empty($data)) {
            $Model = new UserModel();
            $res = $Model->setBystatus($data);
            return json($res);
        }
    }


}