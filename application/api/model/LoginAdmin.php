<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/11
 * Time: 下午4:16
 */

namespace app\api\model;


class LoginAdmin extends BaseModel
{
    protected $table = 'leo_login_admin';
    protected $autoWriteTimestamp = true;
    public function GetBaseByList(){
        return $this->select();

    }

}