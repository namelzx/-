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
        if(empty($data['shop_id'])){
            return json(['status'=>200,'data'=>$this->groupMeeting($res), 'msg'=>$meeting]);

        }
        $price=db('push_meeting')->where(['bis_id'=>$data['shop_id'],'meeting_id'=>$data['key']])->field('price')->find();
        return json(['status'=>200,'data'=>$this->groupMeeting($res), 'msg'=>$meeting,'price'=>$price['price']]);
    }

    /*
   * 获取符合需求会议室酒店
   */
    public function getMeetingBylist()
    {
        $postdata = input('param.');
        $all = db('push_meeting')->where('meeting_id', $postdata['id'])->field('bis_id')->group('bis_id')->select();
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
        $res = db('push_meeting')->where($data)->field('price')->find();
        return json($res);
    }

    /**
     * 用户报价
     */
    public function Demand_Push()
    {

        $data = input('param.');
        $where=db('push_meeting')->where(['meeting_id'=>$data['meeting_id'],'bis_id'=>$data['bis_id']])->count();
        if($where>0){
            return json(msg(205, '', '报价已提交'));
        }
        db('push_meeting')->insert($data);
        $BisData=Bis::GetBisByFind($data['bis_id']);
        return json(msg(200, $BisData, '报价已提交'));
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