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
use app\commonly\model\Bis;
use app\commonly\model\HotelDemand;
use app\commonly\model\HotelRoom;
use EasyWeChat\Factory;
use think\Db;

class Hotel extends Base
{
    public function getRoombyList()
    {

        $res = db('facilities')->field('id')->select();
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
        $app = Factory::officialAccount(config('eas'));
        $PostData = input('param.');
        $bis_id = Db::name('hotel_certification')->alias('c')
            ->where('c.citycode', $PostData['citycode'])
            ->where('c.areacode', $PostData['areacode'])
            ->join('hotel_room r', 'r.user_id=c.user_id')
            ->join('server_shop s', 's.shop_id=c.user_id')
            ->join('bis b', 'b.user_id=c.user_id')
            ->group('c.id')
            ->field('b.user_id')->select();
        $result = array_reduce($bis_id, function ($result, $value) {
            return array_merge($result, array_values($value));
        }, array());


        $PostData['low_price'] = intval($PostData['low_price']);
        $PostData['max_price'] = intval($PostData['max_price']);
        $res = HotelDemand::PostByData($PostData);

        for ($i = 0; $i < count($result); $i++) {
            $all = db('user_wechat')->where('user_id', $result[$i])->find();
            $app->template_message->send([
                'touser' => $all['openid'],
                'template_id' => 'dYEakhOSh1uBj7POA5By1ONpcrzPz8ju3bgDohMim60',
                'url' => config('wx_url') . 'hotel/list?key=' . $res,
                'data' => [
                    'keyword1' => '2317829371293',
                    'keyword2' => '2',
                    'keyword3' => '3',
                    'keyword4' => '2',
                    'keyword5' => '3',
                    'remark' => '你有任务旅游领取了',
                ],
            ]);
        }
        db('demand_room')->insertAll($this->groupRoom($PostData['roomlist'], $res));
        return json(['data' => $res, 'msg' => '发布成功']);
    }

    /**
     * 用户报价
     */
    public function Demand_Push()
    {
        $data = input('param.');
        $res = db('push_room')->insertAll($data);
        return json(msg(200, $res, '报价成功'));
    }

    //获取当前需求信息
    public function getHotelRoomByInfo()
    {
        $data = input('param.');
        $res = HotelDemand::get($data['key']);
        $room = DemandRoom::where('demand_id', $data['key'])->field('room_name,number,demand_id')->select();
        if (empty($data['shop_id'])) {
            return json(['status' => 1, 'data' => $this->groupHotel($res), 'room' => $room]);
        } else {
            return json(['status' => 1, 'data' => $this->groupHotel($res), 'room' => $this->MatchingShopRoom($room, $data['shop_id'])]);
        }
    }

    /*
     * 匹配商户房间信息
     */
    public function MatchingShopRoom($visit, $key)
    {
        $visit_list = [];

        $data = HotelRoom::where('user_id', $key)->select();
        for ($i = 0; $i < count($data); $i++) {
            for ($k = 0; $k < count($visit); $k++) {
                if ($data[$i]['room_type'] == $visit[$k]['room_id']) {
                    $visit_list[$k] = $visit[$k];
                    $visit_list[$k]['price'] = $data[$i]['price'];
                } else {
                    $visit_list[$k] = $visit[$k];
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
        //获取该商家所有报价商家
        $all = db('push_room')->where('demand_id', $postdata['id'])->field('bis_id')->group('bis_id')->select();
        $result = array_reduce($all, function ($result, $value) {
            return array_merge($result, array_values($value));
        }, array());
        $res = Bis::GetBisByList($result, $postdata);
        return json($res);
    }

    /**
     * 获取商家报价
     */
    public function GetBisPush()
    {
        $data = input('param.');
        $res = db('push_room')->where($data)->select();
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