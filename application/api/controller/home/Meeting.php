<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/12/20
 * Time: 9:28 PM
 */

namespace app\api\controller\home;

use app\commonly\model\Bis;
use app\commonly\model\MeetingDemand;
use app\commonly\model\MeetingOrder;
use think\Db;


/**
 * Class Meeting 会议室
 * @package app\api\controller\home
 */
class Meeting extends Base
{
    /**
     * 添加会议室需求
     */
    public function postMeetingDemandByData()
    {
        $PostData = input('param.');
        $res = MeetingDemand::PostByData($PostData);
        db('demand_meeting')->insertAll($this->groupRoom($PostData['beverage'], $res));
        return json(msg(200, $res, '提交成功'));
    }

    //获取当前需求信息
    public function getMeetingRoomByInfo()
    {
        $data = input('param.');
        $res = MeetingDemand::get($data['key']);
        $meeting =db('demand_meeting')->where('meeting_id', $data['key'])->select();
        return json(msg(200, $this->groupMeeting($res), $meeting));

    }

    /*
   * 获取符合需求会议室酒店
   */
    public function getMeetingBylist()
    {
        $postdata = input('param.');

        $data = MeetingDemand::get($postdata['id']);
        $res = Db::name('hotel_certification')->alias('c')
            ->where('c.citycode', $data['citycode'])
            ->where('c.areacode', $data['areacode'])
            ->join('hotel_room r', 'r.user_id=c.user_id')
            ->join('server_shop s', 's.shop_id=c.user_id')
            ->join('bis b', 'b.user_id=c.user_id')
            ->group('c.id')
            ->field('b.user_id as id,b.logo,b.qiyeming,b.start_price as price,r.title,b.tel,c.city,c.areavalue')
            ->paginate(20, false, ['query' => $postdata['page'],]);
        return json($res);
    }

    /**
     * 用户报价
     */
    public function Demand_Push()
    {
        $data = input('param.');
        db('push_meeting')->insert($data);
        $BisData=Bis::GetBisByFind($data['bis_id']);
        return json(msg(200, $BisData, '报价成功'));
    }
    /**
     * 提交订单
     */
    public function PostMeetingOrderByData(){
        $data=input('param.');
        $data['create_time']=time();
        $data['status']=1;
        $res=MeetingOrder::PostByData($data);

        return json(msg(200,$res,'提交成'));
    }

    /* 酒店详细信息重装 */
    function groupMeeting($data)
    {
        $visit_list = $data;
        $star = db('hotel_basic')->where('id', $data['star'])->field('info_name')->find();
        $visit_list['star_name'] = $star['info_name'];
        return $visit_list;
    }




    /* 发布任务数据重装 */
    function groupRoom($visit, $id)
    {
        $visit_list = [];
        foreach ($visit as $v => $item) {
            $visit_list[$v] = $visit[$v];
            $visit_list[$v]['meeting_id'] = $id;
        }
        return $visit_list;
    }
}