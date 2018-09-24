<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/29
 * Time: 下午8:29
 */

namespace app\api\controller;


use think\Db;

class Test
{

    public function  timing(){
        db('wzd_user')->where('status','neq',2)->data(['status' => 2])->update();
        return json('更新成功');
    }
    public function typedata($page, $limit, $type)
    {
        $infolist = Db::table('wzd_advertising')->alias('a')
            ->join('wzd_user u', 'u.id=a.user_id', 'left')
            ->field('a.id,a.title,a.user_id,a.type,a.area,a.images_url,a.business,a.phone,u.headimgurl')
            ->order('a.user_id desc ');
        if ($type != '0') {
            $infolist = $infolist->where('a.type', $type);
        }
        $infolist = $infolist->paginate($limit, false, ['query' => $page,]);
        $data = [];
        foreach ($infolist as $k => $item) {
            if ($infolist[$k]['user_id'] == 0) {
                $data[$k] = $infolist[$k];
                $data[$k]['zx'] = '离线';
            } else {
                if ($infolist)
                    $data[$k] = $infolist[$k];
                $data[$k]['zx'] = '在线';
            }
        }
        return json(['data' => $data, 'to' => $infolist]);
    }

    public function wev()
    {
        $url = "http://api.k780.com/?app=weather.today&weaid=101301303&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json";
        $res = $this->http_request($url);
        $aa=  json_decode($res,true);
        return json($aa);
    }

    public function zb($latitude,$longitude)
    {
//        $zb=(string)$latitude.','(string)$longitude;
        $url = "http://api.map.baidu.com/geocoder/v2/?location=".$latitude.",".$longitude."&output=json&pois=1&ak=OkGUiiwiRMGbE1nCMkmapPsfbLMvs7xB";
        $res = $this->http_request($url);
        $aa=  json_decode($res,true);
        return json($aa);
    }

    function delete_fxg($array) {
        while(list($k,$v) = each($array)) {
            if (is_string($v)) {
                $array[$k] = stripslashes($v);//去掉反斜杠字符
            }
            if (is_array($v))  {
                $array[$k] = delete_fxg($v);//调用本身，递归作用
            }
        }
        return $array;
    }
    protected function http_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}