<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/12
 * Time: 下午4:22
 */

namespace app\api\model;


class User extends BaseModel
{

    protected $table = 'leo_user';
    protected $autoWriteTimestamp = true;
    public function setBystatus($data){

        return $this->where('id',$data['id'])->data('status',$data['status'])->update();
    }
}