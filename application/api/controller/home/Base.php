<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/8/4
 * Time: 下午4:57
 */

namespace app\api\controller\home;


use OSS\Core\OssException;
use Oss\OssClient;
use think\Controller;
use think\Db;
use think\Image;

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
                $fileName = 'uploads/' . $info->getSaveName();
                $this->uploadFile('youalixing', $fileName, $info->getPathname());
                return json(msg(200, $info->getSaveName(), '上传成功'));
            }
            $fileName = 'uploads/' . $info->getSaveName();
            $res= $this->uploadFile('youalixing', $fileName, $info->getPathname());
            return json(msg(200, $info->getSaveName(), '1'));
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }

        return json($file);
    }


    /**
     * 实例化阿里云OSS
     * @return object 实例化得到的对象
     * @return 此步作为共用对象，可提供给多个模块统一调用
     */
    function new_oss()
    {
        //获取配置项，并赋值给对象$config
        $config = config('aliyun_oss');
        //实例化OSS
        $oss = new \OSS\OssClient($config['KeyId'], $config['KeySecret'], $config['Endpoint']);
        return $oss;
    }


    /**
     * 上传指定的本地文件内容
     *
     * @param OssClient $ossClient OSSClient实例
     * @param string $bucket 存储空间名称
     * @param string $object 上传的文件名称
     * @param string $Path 本地文件路径
     * @return null
     */
    function uploadFile($bucket, $object, $Path)
    {
        //try 要执行的代码,如果代码执行过程中某一条语句发生异常,则程序直接跳转到CATCH块中,由$e收集错误信息和显示
        try {
            //没忘吧，new_oss()是我们上一步所写的自定义函数
            $ossClient = $this->new_oss();
            //uploadFile的上传方法
            $res = $ossClient->uploadFile($bucket, $object, $Path);
            return json($res);
        } catch (OssException $e) {
            //如果出错这里返回报错信息
            return $e->getMessage();
        }
    }

    public function  gettest(){
//        $data=Db::table('hotel_room')->alias('r')
//            ->
    }

    public function test(){
        $wxdata = array(
            'first' => array('value' => urlencode("你的预约已过期"), 'color' => "#FF0000"),
            'keyword1' => array('value' => urlencode($db[$k]['title']), 'color' => '#FF0000'),
            'keyword2' => array('value' => urlencode(date('Y-m-d H:s', $db[$k]['create_time'])), 'color' => '#FF0000'),
            'keyword3' => array('value' => urlencode(date('Y-m-d H:s', $db[$k]['appointment'])), 'color' => '#FF0000'),
            'remark' => array('value' => urlencode('任务已删除，请重新发布'), 'color' => '#FF0000'),
        );
        $this->doSend($db[$k]['openid'], 'NAkFwGox4MnIuLvtfsQwv9exNkz8aN3N-nKHtXmbkuQ', 'https://new.10huisp.com/index/', $wxdata);
    }
    /**
     * 发送自定义的模板消息
     * @param $touser
     * @param $template_id
     * @param $url
     * @param $data
     * @param string $topcolor
     * @return bool
     */
    public function doSend($touser, $template_id, $url, $data)
    {
        $access_token = cache('access_token');
        $template = array(
            'touser' => $touser,
            'template_id' => $template_id,
            'url' => $url,
            'topcolor' => "#7B68EE",
            'data' => $data
        );
        $json_template = json_encode($template);
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $access_token;
        $res = $this->http_request($url, urldecode($json_template));
        if ($res) {
            return $res;
        } else {
            return $res;
        }

    }

}