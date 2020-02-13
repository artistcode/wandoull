<?php

namespace app\task\controller;

use app\admin\model\Member;
use think\Controller;
use think\Request;
class PromotionController extends BaseController
{
    public function index(){

        /**
         * 成功推广连接
         */
        $member_info = session('member');
        $member_id = $member_info['member_id'];
        $extension_url = "http://".$_SERVER['HTTP_HOST']."?tg=$member_id";
        $this->assign('extension_url',$extension_url);
        return $this->fetch();

    }


    public  function offline(){
        $member = (new Member());
        $member  =$member->where(['subordinate_member_id' =>session('member.member_id')]);
        $member = $member->leftJoin('w_member_level','w_member.member_level_id =w_member_level.level_id');
        $data = $member->page(sprintf('%s,%s',input('get.page'),input('get.limit')));
         $data  =$data->select();
        return json(array('code' => 0, 'msg' => "", 'data' => $data, 'count' =>$member->count()));
    }


}
