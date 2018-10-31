<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/7/18
 * Time: 下午10:28
 */

namespace app\api\controller\hotel;


use app\api\model\HotelBaseM;
use app\commonly\model\Bis;
use app\commonly\model\HotelRoom;
use JWT\JWT;

class Hotelbase extends Base
{
    public function index()
    {
        dump('1');
    }

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
        $info = input('param.');
        $Model = new Bis();
        $res = $Model->alias('b')->join('hotel_certification c', 'b.user_id=c.user_id');
        $res = $res->where('b.user_id', $info['id'])->find();
        return json($res);
    }

//    获取服务项数据
    public function ServerBySist()
    {
        $id = input('param.id');
        $Model = new HotelBaseM();
        $res = $Model;
        $res = $res->select();
        $server_shop = db('server_shop')->where('shop_id', $id)->select();

        return json($this->groupVisit($res, $server_shop));
    }

    /*
     * 获取房间配置
     */

    public function roomBylist()
    {
        $res = db('facilities')->where('type', 2)->field('id')->select();
        $visit_list = [];
        foreach ($res as $v) {
            $visit_list[] = $v['id'];
        }
        $base = db('hotel_basic')->where('parent_class', 'in', $visit_list)->select();
        $server_shop = db('server_shop')->where('shop_id', 3)->select();
        return json($this->groupVisit($base, $server_shop));
    }

    function object_array($array)
    {
        if (is_object($array)) {
            $array = (array)$array;
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array[$key] = object_array($value);
            }
        }
        return $array;
    }

    public function setServer()
    {
        $data = input('param.');
        db('server_shop')->where('shop_id', $data['id'])->delete();
        foreach ($data['che'] as $k => $v) {
            $cdata['basic_id'] = $v;
            $cdata['shop_id'] = floor($data['id']);
            $res = db('server_shop')->insert($cdata);
            if (!$res) {
                return json($cdata);
            }
        }
        return json('添加成功');
    }

    /* 数据重装 */
    function groupVisit($visit, $server_shop)
    {
        $visit_list = [];
        foreach ($visit as $v) {
            $parent = db('facilities')->where('id', $v['parent_class'])->field('type_name')->find();
            $date = db('facilities')->where('id', $v['child_class'])->field('type_name')->find();
            foreach ($server_shop as $k) {
                if ($k['basic_id'] == $v['id']) {
                    $v['checkbox'] = 1;
                }
            }
            $visit_list[$parent['type_name']][$date['type_name']][] = $v;
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
            $res = db('bis')->strict(false)->where('user_id',7)->update($data);
            return json(msg(1, $res, '更新成功'));
        }
    }

    public function facilitiesList()
    {
        $Model = new HotelBaseM();
        $res = $Model->select();
        return json($res);
    }

    public function PostRoombyAdd()
    {
        $data = input('param.');
        $res = HotelRoom::PostByData($data);
        $info['room_id'] = intval($res->id);
        $info['bed_type'] = $data['info']['bed_type'];
        $info['width'] = $data['info']['width'];
        $info['number'] = $data['info']['number'];
        db('room_info')->insert($info);
        return json(msg(1, $this->roominfo($data), '添加成功'));
    }

    public function getRoombyList()
    {
        $id = input('param.id');
        $data = HotelRoom::where('user_id', $id)->select();

        return json(msg(1, $this->roominfolist($data), '获取成功'));
    }

    public function roombyDel()
    {
        $id = input('param.id');
        $res = HotelRoom::destroy($id);
        return json(msg(1, $res, '删除成功'));
    }

    function roominfolist($data)
    {
        $result = array();
        foreach ($data as $v => $item) {
            $result[$v] = $data[$v];
            $info['is_add_bed'] = db('hotel_basic')->where('id', $data[$v]['is_add_bed'])->field('info_name')->find();
            $info['iswindow'] = db('hotel_basic')->where('id', $data[$v]['iswindow'])->field('info_name')->find();
            $info['room_type'] = db('hotel_basic')->where('id', $data[$v]['room_type'])->field('info_name')->find();
            $result[$v]['is_add_bed'] = $info['is_add_bed']['info_name'];
            $result[$v]['iswindow'] = $info['iswindow']['info_name'];
            $result[$v]['room_type'] = $info['room_type']['info_name'];
        }
        return $result;
    }

    function roominfo($data)
    {
        $result = array();
        foreach ($data as $v => $item) {
            $result[$v] = $data[$v];
            $info['is_add_bed'] = db('hotel_basic')->where('id', $data['is_add_bed'])->field('info_name')->find();
            $info['iswindow'] = db('hotel_basic')->where('id', $data['iswindow'])->field('info_name')->find();
            $info['room_type'] = db('hotel_basic')->where('id', $data['room_type'])->field('info_name')->find();
            $result['is_add_bed'] = $info['is_add_bed']['info_name'];
            $result['iswindow'] = $info['iswindow']['info_name'];
            $result['room_type'] = $info['room_type']['info_name'];
        }
        return $result;
    }

}