<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/5/22
 * Time: 下午12:11
 */

namespace app\api\controller;


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

//
//注释掉的是缩图
//            $path = '/uploads/' . $info->getSaveName();
//            $image = \think\Image::open('./uploads/' . $info->getSaveName());
////将图片裁剪为300x300并保存为crop.png
//            $image->thumb(00, 300)->save('./uploads/' . $info->getFilename());
////             成功上传后 返回上传信息
//            return json(array('state' => 1, 'path' => $path));


            $path = '/uploads/' . $info->getSaveName();
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

        $info = $file->move('./uploads','');
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
    public function index()
    {
       dump("sss");
    }


    function base64_image_content($base64_image_content,$path){
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $new_file = $path."/".date('Ymd',time())."/";
            if(!file_exists($new_file)){
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0700);
            }
            $new_file = $new_file.time().".{$type}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                return '/'.$new_file;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}