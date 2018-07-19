<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/5/6
 * Time: 下午10:39
 */

namespace app\index\controller;

use app\commonly\model\Bis;
use  app\commonly\model\User as UserModel;

class User extends Base
{
    public function index()
    {
        $wx_usertest = session('wx_user_info');
        $wx_user = [
            'headimgurl' => ' http://thirdwx.qlogo.cn/mmopen/vi_32/ASzcVXmk7icibsTQzCtgb199ibPb3je4pcfpMHPRAFrpwfR46pic9GTPgEtteTJNSjtP394IQe5GLKSHAZFes5k6ZA/132',
            ''
        ];
        $assign = [
            'wx_user' => $wx_user,
        ];
        $this->assign($assign);
        return view();
    }

    // 认证信息
    public function certification()
    {
        $assign = [
            'type'=>1,
        ];
        $this->assign($assign);
        return view();
    }

    /*
     * 个人认证
     */
    public function perauth()
    {
        $user_id = session('user_id');
        $Model = new UserModel();
        if (request()->isPost()) {
            $postdata = input('param.');
            $listcount = $Model->where('username', $postdata['username'])->whereOr('card_id', $postdata['card_id'])->count();
            if ($listcount < 0) {
                $res = $Model->allowField(true)->save($postdata);
                if ($res) {
                    return json(msg(1, '', '认证提交中'));
                } else {
                    return json(msg(2, '', '提交认证信息失败'));
                }
            } else {
                $update = [
                    'username' => $postdata['username'],
                    'card_id' => $postdata['card_id'],
                    'phone' => $postdata['phone'],
                    'city' => $postdata['city'],
                    'area' => $postdata['area'],
                ];
                $res = $Model->where('id', $user_id)->update($update);
                if ($res) {
                    return json(msg(1, '', '更新成功'));
                } else {
                    return json(msg(2, '', '更新失败'));
                }
            }
        }
        $res = $Model->where('id', $user_id)->find();
        $assign = [
            'res' => $res,
        ];
        $this->assign($assign);
        return view();
    }

    /*
     * 企业认证
     */
    public function enterprissauth()
    {
        if(request()->isPost()){
            $postdata=input('param.');
            $Model=new Bis();
            $res=$Model->allowField(true)->save($postdata);
            if($res){
                return json(msg(1,'','已经提交认证'));
            }
            return json(msg(2,'','提交认证失败'));
        }
        return view();
    }

    /*
     * 旅行社认证
     */
    public function travelauth()
    {
        return view();
    }


}