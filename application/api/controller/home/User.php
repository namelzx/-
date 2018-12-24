<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/20
 * Time: 下午5:21
 */

namespace app\api\controller\home;


use app\api\Jssdk\Jssdk;
use app\api\model\UserWechat;
use app\api\Validate\UserValidate;
use app\commonly\model\Certification;
use app\commonly\model\HotelCertification;
use app\commonly\model\User as UserModel;
use app\validate\CertificationValidate;

class User extends Base
{
    /**
     * @param $openid 微信端根据用户openid获取数据
     */
    public function getUserByinfo()
    {
        $openid = input('param.id');
        $config = config('weixin');
        $res['info'] = UserWechat::getUserbyInfo($openid);
        $jssdk = new Jssdk($config);
        $res['sign'] = $jssdk->getSignPackage();
        return json($res);
    }

    public function login()
    {
        $data = input('param.');
        /*
         * 使用微信登陆
         */
        $res = db('user')->where('id', $data['id'])->find();
        if ($res['phone'] == $data['phone']) {
            return json(msg(200, $res['phone'], '进入主页'));
        } else {
            db('user')->where('id', $data['id'])->data(['phone'=>$data['phone']])->update();
            return json(msg(200, $res['phone'], '修改'));
        }

        /*
         * 不使用微信登陆
         */
//        $user = db('user')->where('phone', $data['phone'])->find();
//        if (empty($user)) {//该手机号码未注册
//            $id = db('user')->insertGetId($data);
//            return json(msg(204, $id, '注册信息成功进入用户信息完善'));
//        } else { //手机号码已经注册
//            return json(msg(200, $user['id'], '进入主页'));
//        }
//        return json($userfind);
    }

    /**
     * 用户认证
     */
    public function setUserbyCertification()
    {
        (new CertificationValidate())->goCheck();
        $data = input('param.');

        $usercount = Certification::where('user_id', $data['user_id'])->count();
        if ($usercount < 1) {
            $res = Certification::PostCertificationByData($data);
            if ($res) {
                return json(msg(200, 'null', '提交成功'));
            } else {
                return json(msg(201, 'null', '提交失败'));
            }
        } else {
            $res = Certification::PostUdateByData($data);
            if ($res) {
                return json(msg(200, 'null', '更新成功'));
            } else {
                return json(msg(201, 'null', '更新失败'));
            }
            return json(msg(204, 'null', '提交已申请请耐心等待'));
        }

    }

    /*
     * 酒店认证
     */
    public function setHotelUserbyCertification()
    {

        $data = input('param.');

        $usercount = HotelCertification::where('user_id', $data['user_id'])->count();
        $HoleModel = new HotelCertification();
        if ($usercount < 1) {
            $bisdata['user_id'] = $data['user_id'];
            $bisdata['qiyeming'] = $data['qiyeming'];
            db('bis')->insert($bisdata);
            $res = $HoleModel->allowField(true)->save($data);
//                HotelCertification::PostCertificationByData($data);
            if ($res) {
                return json(msg(200, $res, '提交成功'));
            } else {
                return json(msg(201, $res, '提交失败'));
            }
        } else {
            $bisdata['user_id'] = $data['user_id'];
            $bisdata['qiyeming'] = $data['qiyeming'];
            db('bis')->strict(true)->where('user_id', $data['user_id'])->update($bisdata);
            $res = $HoleModel->allowField(true)->save($data, ['user_id' => $data['user_id']]);
            if ($res) {
                return json(msg(200, $res, '更新成功'));
            } else {
                return json(msg(201, $res, '更新失败'));
            }
            return json(msg(204, $res, '提交已申请请耐心等待'));
        }

    }

    /*
    * 获取认证信息
    */
    public function gethotelbyCertification($user_id)
    {

        $data = HotelCertification::getBYinfo($user_id);
        if ($data) {
            return json(msg(200, $data, '成功获取'));
        } else {
            return json(msg(404, $data, '尚未认证'));
        }

    }

    /*
     * 旅行社 获取认证信息
     */
    public function getUserbyCertification($user_id)
    {
        $data = Certification::where('user_id', $user_id)->find();
        if ($data) {
            return json(msg(200, $data, '成功获取'));
        } else {
            return json(msg(404, $data, '尚未认证'));
        }

    }

    /*
     * 修改用户信息
     */
    public function setUserbyInfo()
    {
        $data = input('param.');
//        (new TokenValidate())->goCheck();
        (new UserValidate())->goCheck();
        $res = UserModel::PostUpdateByData($data);
        if ($res) {
            return json(msg(200, $res, '感谢使用'));
        } else {
            return json(msg(201, $res, '更新失败'));
        }
    }

    public function UserbyInfo()
    {

        $data = input('param.');
        $res = UserModel::with('wechat')->where($data)->find();
        if ($res) {
            return json(msg(200, $res,'获取成功'));
        } else {
            return json(msg(201, $res, '获取失败'));
        }
    }

}