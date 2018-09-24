<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/12
 * Time: 下午4:23
 */

namespace app\api\controller\admin;

use app\api\model\User as UserModel;
use app\commonly\model\Certification;


class User extends Base
{
    public function GetList()
    {
        $data = input('get.');
        $Model = new Certification();
        $res = $Model->alias('c')->join('user u','u.id=c.user_id');
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