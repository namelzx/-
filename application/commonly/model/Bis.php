<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/15
 * Time: 下午3:35
 */

namespace app\commonly\model;


class Bis extends BaseModel
{
    protected $table = 'leo_bis';
    protected $autoWriteTimestamp = true;

    public function setBystatus($data)
    {

        return $this->where('id', $data['id'])->data('status', $data['status'])->update();
    }


}