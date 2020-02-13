<?php

namespace app\admin\model;
use think\Model;
class AdminUser extends Model
{
    protected static function init()
    {
        AdminUser::beforeInsert(function ($user) {
                $user->admin_passwd =md5(md5(trim($user->admin_passwd).config('salt')));
        });
    }
    protected $pk = 'admin_id';
    public function checkUser($username,$password){
        $condition = [
            'admin_account'=>$username,
            'admin_passwd'=>md5(md5($username.config('salt'))),
            ];

        $user = $this->where($condition)->find();
        if ($user){
            $this->menu($user->admin_group);
            session('userinfo',$user);
            return true;
        }else{
            $this->error ='用户名错误';
            return false;
        }
    }

    private  function  menu($group_id){
        $group_condition = ['admin_group_id'=>$group_id];
        $group  = $this->name('admin_group')->where($group_condition)->find();
        if ((int) $group_id == 1){
                // 超级管理员
            $menu_condition = sprintf('type in(1,2)');
            $menu = $this->name('admin_menu')->where($menu_condition)->order('sort')->select();
            $menu_list = $menu->toArray();
            session('menu',$menu_list);
        }else{
            // 普通管理员
            $menu_condition = [
                'menu_id'=>sprintf('menu_id in(%s)',$group->menu_id_list)
                , 'status' => 0,
                'type'=>1,
            ];
            $menu = $this->name('admin_menu')->where($menu_condition)->order('sort')->select();
           $menu_list = $menu->toArray();
           session('menu',$menu_list);
        }
    }
}
