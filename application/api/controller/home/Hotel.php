<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/9/7
 * Time: 下午1:13
 */

namespace app\api\controller\home;

use app\api\model\DemandRoom;
use app\api\Validate\DemandValidate;
use app\commonly\model\HotelDemand;
use app\commonly\model\HotelRoom;
use think\Db;

class Hotel extends Base
{
    public function getRoombyList()
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

    //添加酒店需求
    public function postHotelDemandByData()
    {
        (new DemandValidate())->goCheck();
        $PostData = input('param.');
        $PostData['low_price'] = intval($PostData['low_price']);
        $PostData['max_price'] = intval($PostData['max_price']);
        $res = HotelDemand::PostByData($PostData);
        db('demand_room')->insertAll($this->groupRoom($PostData['roomlist'], $res));
        return json(['data' => $res, 'msg' => '发布成功']);
    }

    //获取当前需求信息
    public function getHotelRoomByInfo()
    {
        $data = input('param.');
        $res = HotelDemand::get($data['key']);
        $room = DemandRoom::where('demand_id', $data['key'])->select();
        return json(['status' => 1, 'data' => $this->groupHotel($res), 'room' => $this->MatchingShopRoom($room, $data['shop_id'])]);
    }

    /*
     * 匹配商户房间信息
     */
    public function MatchingShopRoom($visit, $user_id)
    {
        $visit_list = [];
        $data = HotelRoom::where('user_id', $user_id)->select();
        for ($i = 0; $i < count($data); $i++) {
            for ($k = 0; $k < count($visit); $k++) {
                if ($data[$i]['room_type'] == $visit[$k]['room_id']) {
                    $visit_list[$k] = $visit[$k];
                    $visit_list[$k]['price'] = $data[$i]['price'];
                }else{
                    $visit_list[$k] = $visit[$k];
//                    $visit_list[$k]['price'] ="酒店没有这个房型";
                }
            }
        }
        return $visit_list;
    }

    /*
     * 获取符合需求酒店
     */
    public function getHotelBylist()
    {
        $postdata = input('param.');
        $data = HotelDemand::get($postdata['id']);

        $res = Db::name('hotel_certification')->alias('c')
            ->where('c.citycode', $data['citycode'])
            ->where('c.areacode', $data['areacode'])
            ->join('hotel_room r', 'r.user_id=c.user_id')
            ->join('server_shop s', 's.shop_id=c.user_id')
//            ->where('s.basic_id', $data['star'])
//            ->where('r.room_type', $data['room'])
            ->join('bis b', 'b.user_id=c.user_id')
            ->group('c.id')
            ->field('b.user_id as id,b.logo,b.qiyeming,b.start_price as price,c.areavalue,r.title,b.tel')
            ->paginate(20, false, ['query' => $postdata['page'],]);
        return json($res);
    }

    /* 酒店详细信息重装 */
    function groupHotel($data)
    {

        $visit_list = $data;
        $star = db('hotel_basic')->where('id', $data['star'])->field('info_name')->find();
        $room = db('hotel_basic')->where('id', $data['room'])->field('info_name')->find();
        $bed = db('hotel_basic')->where('id', $data['bed'])->field('info_name')->find();
        $visit_list['star_name'] = $star['info_name'];
        $visit_list['room_name'] = $room['info_name'];
        $visit_list['bed_name'] = $bed['info_name'];
        return $visit_list;
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


    /* 发布任务数据重装 */
    function groupRoom($visit, $id)
    {
//        dump($visit);
        $visit_list = [];
        foreach ($visit as $v => $item) {
            $visit_list[$v] = $visit[$v];
            $visit_list[$v]['demand_id'] = $id;
        }
        return $visit_list;
    }

}