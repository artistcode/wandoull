<?php

namespace app\task\controller;

use think\Controller;
use think\Db;
use think\Request;
class AppController extends BaseController {
    public function index(){
        return  $this->fetch();
    }
    public function menu(){
        $menu  =  Db::name('task_column')->order('sort asc ')->select();
        $build = [];
        if (!empty($menu)){
            foreach ($menu as $item) {
                $build[$item['task_column_id']]['icon'] = $item['icon'];
                $build[$item['task_column_id']]['id'] = $item['task_column_id'];
                $build[$item['task_column_id']]['name'] = $item['task_column_name'];
                $build[$item['task_column_id']]['pid'] = $item['task_column_parent'];
                $build[$item['task_column_id']]['url']=  empty($item['control'])  ?  'href="javascript:;"' : 'lay-href=/task/'.$item['control'].'/'.$item['method'];
            }
            $tree = array();
            foreach($build as $item){
                if(isset($build[$item['pid']])){
                    $build[$item['pid']]['subMenus'][] = &$build[$item['id']];
                }else{
                    $tree[] = &$build[$item['id']];
                }
            }
            return json(array('code' => 0, 'msg', '权限', 'data' => $tree));
        }
        return json(array('code' => 404, 'msg', '权限', ));
    }
    public function  console(){
        return $this->fetch();
    }

    public function  gerenzhuye(){
        return $this->fetch();
    }
    public function getUserinfo(){
        $member_id  =session('member.member_id');
            session('member',null);
        $member = DB::name('member')->where('member_id', $member_id)->find();
        session('member', $member);
        unset($member['pwd']);
        return json($member);
    }
}
