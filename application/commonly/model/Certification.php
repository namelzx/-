<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/22
 * Time: 上午12:40
 */

namespace app\commonly\model;


class Certification extends BaseModel
{

    public function items()
    {
        return $this->hasMany('User', 'id', 'user_id');
    }

    public static function GetByList($data)
    {

        $res = self::hasWhere('items',function ($query)use($user){
            $query->where('username', 'eq', $user);
        })->with('items')
          ->paginate($data['limit'], false, ['query' => $data['page'],]);
        return $res;
    }
    public static function PostCertificationByData($data)
    {
        return self::create($data);

    }
    public static function PostUdateByData($data)
    {
        return self::where('user_id', $data['user_id'])->update($data);
    }

}