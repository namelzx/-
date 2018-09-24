<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/11
 * Time: 下午3:31
 */

namespace app\api\controller\hotel;


use think\Controller;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token");

class Base extends Controller
{

    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');

        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move('./uploads');
        if ($info) {
            //如果大于100k那么就是进行图片压缩
            if ($info->getInfo()['size'] > 102436) {
                $image = Image::open($info->getpathName());
                $image->thumb(500, 500)->save($info->getpathName());
                return json(msg(200, $info->getpathName(), '上传成功'));
            }
            return json(msg(200, $info->getpathName(), '上传成功'));
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }

        return json($file);
    }


}