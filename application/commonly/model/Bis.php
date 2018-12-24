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
    protected $hidden=['id'];

    public function wibis()
    {
        return $this->hasOne('HotelCertification', 'user_id', 'user_id');
    }


    /**
     * @param $data 条件
     * @param $page 分页
     * @throws \think\exception\DbException
     */
    public  static function GetBisByList($data,$page){
        $res=self::with('wibis')->whereIn('user_id',$data) ->paginate(20, false, ['query' => $page['page'],]);
        return $res;
    }

    /**
     * @param $data 条件
     * 获取但用户信息
     */
    public  static function GetBisByFind($data){
        $res=self::with('wibis')->whereIn('user_id',$data) ->find();
        return $res;
    }
    public function setBystatus($data)
    {

        return $this->where('id', $data['id'])->data('status', $data['status'])->update();
    }


}