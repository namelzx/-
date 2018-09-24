<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/30
 * Time: 下午3:45
 */

namespace app\api\controller\admin;
use app\api\model\User as UserModel;
use app\commonly\model\Certification as CertificationModel;
use app\commonly\model\HotelCertification;


class Certification extends Base
{
    public function GetList()
    {
        $data = input('get.');
        $Model = new CertificationModel();
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
        $res = $res->field('c.id,u.username,u.phone,c.IdCardmuber,c.IdCard,c.Licensemuber,c.License,c.BusLicensemuber,c.BusLicense,c.status,c.user_id')->paginate($data['limit'], false, ['query' => $data['page'],]);
        return json($res);
    }
    /*
     * 旅行社审核
     */
    public function setStatus(){
        $data = input('param.');
        if (!empty($data)) {
            $Model = new CertificationModel();
            if(empty($data['status'])){
                $data['status']=0;
            }
            $res = $Model->where('id','eq',$data['id'])->data($data)->update();
            \app\commonly\model\User::where('id',$data['user_id'])->data(['travel'=>$data['status'],'status'=>$data['status']])->update();
            return json($data);
        }
    }
    public function GetHotelList()
    {
        $data = input('get.');
        $Model = new HotelCertification();
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
        $res = $res->field('c.id,u.username,u.phone,c.busLicenseid,c.buslicense,c.speciallicenseid,c.speciallicense,c.conslicenseid,c.conslicense,c.status,c.user_id,c.ctripurl,c.meituanurl,c.feizhuurl')->paginate($data['limit'], false, ['query' => $data['page'],]);
        return json($res);
    }
    /*
     * 旅行社审核
     */
    public function setHotelStatus(){
        $data = input('param.');
        if (!empty($data)) {
            $Model = new HotelCertification();
            if(empty($data['status'])){
                $data['status']=0;
            }
             $Model->where('id','eq',$data['id'])->data($data)->update();
            \app\commonly\model\User::where('id',$data['user_id'])->data(['travel'=>$data['status'],'status'=>$data['status']])->update();
            return json($data);
        }
    }
}