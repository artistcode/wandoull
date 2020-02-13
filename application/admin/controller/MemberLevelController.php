<?php

namespace app\admin\controller;

use app\admin\model\Consume;
use app\admin\model\Member;
use app\admin\model\MemberLevel;
use think\Controller;

class MemberLevelController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function read()
    {
        $Member = new MemberLevel();
        $data = $Member->select();
        return json(array('code' => 0, 'msg' => "", 'data' => $data, 'count' =>$Member->count()));
    }
    public function  del(){
        $result =MemberLevel::get(input('post.'))->delete();
        Consume::where(['level_id'=>input('post.level_id')])->delete();
        if($result){
            return json(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json(['code'=>500,'msg'=>'删除失败']);
        }
    }
    public function upd(){
        $Member = (new MemberLevel())->isUpdate(true)->save(input('post.'));
        if ($Member){
            return  json(['code'=>0,'msg'=>'更新成功']);
        }else{
            return  json(['code'=>0,'msg'=>'删除成功']);
        }
    }
    public function save(){
       $res =  (new MemberLevel())->save(input('post.'));
       if ($res){
           return json(['code'=>0,'msg'=>'添加成功']);
       }else{
           return json(['code'=>500,'msg'=>'添加失败']);
       }
    }
}
