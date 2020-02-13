<?php

namespace app\admin\controller;

use app\admin\model\AdminUser;
use think\captcha\Captcha;
use think\Controller;
use think\Loader;
use think\Request;

class AppController extends BaseController
{
    public function  index(){
        return $this->fetch();
    }
    public function menu(){
        $menu = session('menu');
        $build = [];
        if (!empty($menu)){
            foreach ($menu as $item) {
                $build[$item['menu_id']]['icon'] = $item['icon'];
                $build[$item['menu_id']]['id'] = $item['menu_id'];
                $build[$item['menu_id']]['name'] = $item['menu_name'];
                $build[$item['menu_id']]['pid'] = $item['menu_parent_id'];
                $build[$item['menu_id']]['url']=      empty($item['control'])  ?  'href="javascript:;"' : 'lay-href=/admin/'.$item['control'].'/'.$item['method'].'?menu_id='. $item['menu_id'];
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
    public function console(){
        return $this->fetch('home/console');
    }


}
