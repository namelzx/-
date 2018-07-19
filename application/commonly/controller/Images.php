<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/15
 * Time: 下午12:58
 */

namespace app\commonly\controller;


use think\Controller;
use think\Image;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token");

class Images extends controller
{
    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下

        $info = $file->move('./uploads');
        if ($info) {

            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $path = '/uploads/' . $info->getSaveName();
            // 成功上传后 返回上传信息
            return json(array('state' => 1, 'path' => $path));
        } else {
            // 上传失败返回错误信息
            return json(array('state' => 0, 'errmsg' => '上传失败'));
        }
    }

    public function training()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下

        $info = $file->move('./uploads', '');
        if ($info) {

            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $path = '/uploads/' . $info->getSaveName();
            // 成功上传后 返回上传信息
            return json(array('state' => 1, 'path' => $path));
        } else {
            // 上传失败返回错误信息
            return json(array('state' => 0, 'errmsg' => '上传失败'));
        }
    }

}