<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/6/20
 * Time: 下午10:06
 */
//
//// 应用公共文件
//defined('ADMIN_STATUS') || define('ADMIN_STATUS', [0 => '停封', 1 => '正常']); //管理员状态
/**
 * 统一返回信息
 * @param $status
 * @param $data
 * @param $msg
 * @return array
 */
function msg($status, $data = '', $msg = '')
{
    return compact('status', 'data', 'msg');
}
/**
 * 统一返回信息
 * @param $status
 * @param $data
 * @param $msg
 * @return array
 */
function msgkey($key, $data = '', $msg = '')
{
    return compact('status', 'data', 'msg');
}

/**
 *  登陆返回信息
 * @param $status
 * @param $data
 * @param $msg
 * @return array
 */
function logomsg($status, $token, $data, $msg = '')
{
    return compact('status', 'token', 'data', 'msg');
}

/**
 * md5加密
 * @param $str
 * @return string
 */
function newMd5($str)
{
    return md5('masterjoy//.' . $str);
}

/**
 * 获取树结构
 * @param $arr
 * @param $index
 * @return array
 */
function getTree($arr, $index)
{
    $tree = [];
    foreach ($arr as $k => $v) {
        if ($v[$index] != 0) {
            $arr[$v[$index]]['children'][] = &$arr[$k];
        } else {
            $tree[] = &$arr[$k];
        }
    }
    return $tree;
}

function certification($type)
{

    $user_id = session('user_id');
    if ($type = 1) {
        $res = db('user')->where('id', $user_id)
            ->field('status')->find();
        if ($res['status'] == 1) {
            return "<div class='cell-right'>认证完成</div>";
        } else {
            return "<div class='cell-right' style='background:#0894ec'>立即认证</div>";
        }
    }
}
