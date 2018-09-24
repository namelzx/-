<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/15
 * Time: 下午7:28
 */

namespace app\api\controller\admin;


use app\commonly\model\Bis;
use app\commonly\model\BisUser;

class Hotel extends Base
{
    //获取数据列表
    public function GetList()
    {
        $data = input('get.');
        $Model = new Bis();
        $res = $Model;
        if (!empty($data['qiyeming'])) {
            $res = $res->where('qiyeming', $data['qiyeming']);
        }
        if (!empty($data['status'])) {
            if ($data['status'] == 2) {
                $res = $res->where('status', 0);
            } else {
                $res = $res->where('status', $data['status']);
            }
        }
        $res = $res->order('status')->paginate($data['limit'], false, ['query' => $data['page'],]);
        return json($res);
    }

    /*
     * 添加数据
     */
    public function create()
    {
        $data = input('post.');
        if (!empty($data)) {
            $Model = new Bis();
            $res = $Model::create($data);
            return json(msg(1, $res->id, '添加成功'));
        }
    }

    /**
     * @return \think\response\Json
     * 修改审核状态
     */
    public function setStatus()
    {
        $data['id'] = input('post.id');
        $data['status'] = input('post.status');
        if (!empty($data)) {
            $Model = new Bis();
            $res = $Model->setBystatus($data);
            return json($res);
        }
    }


//给用户生成随机密码
    function create_password()
    {
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $postdata= input('param.');
        $password = '';
        for ($i = 0; $i < 8; $i++) {
            // 这里提供两种字符获取方式
            // 第一种是使用 substr 截取$chars中的任意一位字符；
            // 第二种是取字符数组 $chars 的任意元素
            // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
            $password .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        $data = [
            'user_id' => $postdata['user_id'],
            'password' => $password,
            'username' => $postdata['phone']
        ];
        $bisuser = db('bis_user')->where('user_id',$postdata['user_id'])->count();
        if ($bisuser < 1) {
            $res = db('bis_user')->insert($data);
            db('bis')->insert(['user_id'=>$postdata['user_id']]);
            if ($res) {
                return json(msg('1', '', '生成成功'));
            } else {
                return json(msg('0', '', '生成失败'));
            }
        } else {
            $res = db('bis_user')->where('user_id', $postdata['user_id'])->update($data);
            if ($res) {
                return json(msg('1', '', '密码重置'));
            } else {
                return json(msg('0', $bisuser, '重置失败'));
            }
        }
    }

    /*
     * 删除数据
     */
    public function delete()
    {
        $data = input('get.');
        if (!empty($data)) {
            $Model = new Bis();
            $res = $Model::destroy($data['id']);
            return json(msg(1, $res, '删除成功'));
        }
    }

    /*
     * 更新数据
     */
    public function update()
    {
        $data = input('post.');

        if (!empty($data)) {
            $postData['info_name'] = $data['info_name'];
            $postData['parent_class'] = $data['parent_class'];
            $postData['child_class'] = $data['child_class'];
            $Model = new Bis();
            $res = $Model::where('id', $data['id'])->update($postData);
            return json(msg(1, $res, '更新成功'));
        }
    }


}