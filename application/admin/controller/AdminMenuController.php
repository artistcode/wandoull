<?php

namespace app\admin\controller;

use app\admin\model\AdminGroup;
use app\admin\model\AdminMenu;
use app\admin\model\AdminUser;
use think\Controller;

class AdminMenuController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function read()
    {
        $AdminMenu = new AdminMenu();
        if(isset($_GET['where'])){
           $AdminMenu =  $AdminMenu->where($_GET['where']);
        }
        $data = $AdminMenu->order('sort')->select();
        return json(array('code' => 0, 'msg' => "", 'data' => $data, 'count' => 100));
    }
    public function tree()
    {
        $children = isset($_GET['type']) ? 'children'  : 'list';
        $id= isset($_GET['type']) ? 'id'  : 'value';
        $data = (new AdminMenu())->select()->toArray();
        $build = [];
        $checked = $this->request->get("checked");
        foreach ($data as $item) {
            $build[$item['menu_id']][$id] = $item['menu_id'];
            $build[$item['menu_id']]['pid'] = $item['menu_parent_id'];
            $build[$item['menu_id']]['name'] = $item['menu_name'];
            if (!empty($checked)){
                if ( in_array($item['menu_id'], explode(',', $checked))){
                    $build[$item['menu_id']]['checked'] =true;
                }
            }

        }
        $tree = [];
        foreach ($build as $item) {
            if(isset($build[$item['pid']])){
                $build[$item['pid']][$children][] = &$build[$item[$id]];
            }else{
                $tree[] = &$build[$item[$id]];
            }
        }
         isset($_GET['type']) && array_unshift($tree,['value'=>0,'pid'=>'0','name'=>'顶级']);

        return isset($_GET['type'])  ?   $tree  : json(['code'=>0,'msg'=>'数据返回成功','data'=>$tree]) ;
    }
    public function  del(){
        $result =AdminMenu::get(input('post.'))->delete();
        if($result){
            return json(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json(['code'=>500,'msg'=>'删除失败']);
        }
    }
    public function upd(){
        $AdminMenu = (new AdminMenu())->isUpdate(true)->save(input('post.'));
        if ($AdminMenu){
            return  json(['code'=>0,'msg'=>'更新成功']);
        }else{
            return  json(['code'=>0,'msg'=>'删除成功']);
        }
    }
    public function save(){
       $res =  (new AdminMenu())->save(input('post.'));
       if ($res){
           return json(['code'=>0,'msg'=>'添加成功']);
       }else{
           return json(['code'=>500,'msg'=>'添加失败']);
       }
    }
}
