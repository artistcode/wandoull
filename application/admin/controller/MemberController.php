<?php

namespace app\admin\controller;

use app\admin\model\Member;
use think\Controller;

class MemberController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
     public function read()
    {
        $Member = new Member();
        $data = $Member->leftJoin('w_member_level','w_member.member_level_id = w_member_level.level_id');
               $data =   $data->page(input('get.page'),input('limit'));
               if(isset($_GET['where'])){
                $data = $data->where($_GET['where']);
               }
               $data =   $data  ->order('member_id desc ');
                $data =   $data->select();;
        return json(array('code' => 0, 'msg' => "", 'data' => $data, 'count' =>$Member->count()));
    }

}
