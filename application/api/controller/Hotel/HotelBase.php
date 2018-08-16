<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/18
 * Time: 下午10:28
 */

namespace app\api\controller\Hotel;


use app\api\model\HotelBaseM;
use app\commonly\model\Bis;
use JWT\JWT;

class HotelBase extends Base
{
    public function test()
    {
        $key = "example_key";
        $token = array(
            "id" => "http://example.org",
            "token" => 1356999524,
        );
        $jwt = JWT::encode($token, $key);
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        print_r($decoded);

    }

    //获取数据列表
    public function GetFind()
    {
        $info = input('get.');
        $Model = new Bis();
        $res = $Model;

        $res = $res->where('id', $info['id'])->find();
        return json($res);
    }

//    获取服务项数据
    public function ServerBySist()
    {
        $id=input('param.id');
        $Model = new HotelBaseM();
        $res = $Model;
        $res = $res->select();
        $server_shop=db('server_shop')->where('shop_id',$id)->select();
//        dump($server_shop);

        return json($this->groupVisit($res,$server_shop));
    }
    public function setServer(){
        $data=input('param.');
        $datapost=[];
        db('server_shop')->where('shop_id',$data['id'])->delete();
        foreach ($data['che'] as $k=>$v)
        {
            $cdata['basic_id']=$v;
            $cdata['shop_id']=floor($data['id']);
           $res= db('server_shop')->insert($cdata);
           if(!$res){
               return json($cdata);
           }
        }
        return json('添加成功');


    }
    /* 浏览记录按日期分组 */
    function groupVisit($visit,$server_shop)
    {
        $visit_list = [];
        foreach ($visit as $v) {
            if ($v['parent_class'] == 1) {
                $parent = '设施项';
                if ($v['child_class'] == 1) {
                    $date = '停车场';
                } elseif ($v['child_class'] == 2) {
                    $date = '电梯';
                } elseif ($v['child_class'] == 3) {
                    $date = '公共区域上网';
                } else {
                    $date = '其他';
                }
            } elseif ($v['parent_class'] == 2) {
                $parent = '服务类';
                if ($v['child_class'] == 1) {
                    $date = '停车场';
                } elseif ($v['child_class'] == 2) {
                    $date = '电梯';
                } elseif ($v['child_class'] == 3) {
                    $date = '公共区域上网';
                } else {
                    $date = '其他';
                }
            } elseif ($v['parent_class'] == 3) {
                $parent = '休闲类';
                if ($v['child_class'] == 1) {
                    $date = '停车场';
                } elseif ($v['child_class'] == 2) {
                    $date = '电梯';
                } elseif ($v['child_class'] == 3) {
                    $date = '公共区域上网';
                } else {
                    $date = '其他';
                }
            }


            foreach($server_shop as $k){

                if($k['basic_id']==$v['id']){
                    $v['checkbox']=1;
                }
            }
            $visit_list[$parent][$date][] = $v;
        }

        return $visit_list;
    }

    function array_val_chunk($array)
    {
        $result = array();
        foreach ($array as $key => $value) {
            $result[$value[1] . $value[2]][] = $value;
        }
        $ret = array();
        //这里把简直转成了数字的，方便同意处理
        foreach ($result as $key => $value) {
            array_push($ret, $value);
        }

    }

    public function getTree($data, $pid = 0, $level = 0)
    {
        //此处应该定义static 如果没有用static，则无法输出全部的栏目信息
        static $tree = array();
        foreach ($data as $key => $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level;
                //str_repeat()函数用于把字符串重复指定的次数，用于区别栏目的等级
                $v['info_name'] = str_repeat('----', $level) . $v['title'];
                $tree[] = $v;

                $this->getTree($data, $v['id'], $level + 1);
            }
        }
        return $tree;

    }

    /*
     * 更新数据
     */
    public function update()
    {
        $data = input('post.');

        if (!empty($data)) {

            $Model = new Bis();
            $res = $Model::where('id', $data['id'])->update($data);
            return json(msg(1, $res, '更新成功'));
        }
    }

    public function facilitiesList()
    {
        $Model = new HotelBaseM();

        $res = $Model->select();
        return json($res);

    }

}