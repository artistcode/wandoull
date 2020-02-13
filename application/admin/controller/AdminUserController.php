<?php

namespace app\admin\controller;

use app\admin\model\AdminUser;
use think\Controller;
use think\Loader;
use think\Request;

class AdminUserController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
       return   $this->fetch();
    }

    public function read(){
         $model = new AdminUser();
         $data = $model->page(input('get.page'),input('get.limit'))->order('admin_id desc')->select();
        return json(['code' => 0, 'msg' => '数据返回成功','count'=>$model->count(),'data'=>$data]);
    }
    public function upd(){
       $update   =  (new AdminUser())->isUpdate(true)->save(input('post.'));
       if ($update){
          return json(['code'=>0,'msg'=>'更新成功']);
       }else{
           return json(['code'=>500,'msg'=>"更新失败"]);
       }
    }
    public function  del(){
        $result =AdminUser::get(input('post.'))->delete();
        if($result){
            return json(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json(['code'=>500,'msg'=>'删除失败']);
        }
    }
    public function save(){
        $userinfo['admin_nickname']  = $this->request->post('admin_nickname');
        $userinfo['admin_passwd'] = input('post.admin_passwd');
        $userinfo['repasswd']  = input('post.repasswd');
        $userinfo['admin_account']  = $this->request->post('admin_account');
        $userinfo['admin_group']  = $this->request->post('admin_group');
        $userinfo['sex']  = $this->request->post('sex');
        $userinfo['remarks']  = $this->request->post('remarks');
        $result = $this->validate($userinfo, 'app\admin\validate\Free');
        if (true !== $result) {
            // 验证失败 输出错误信息
            return json(['code'=>500,'msg'=>$result]);
        }else{
            if ($userinfo){
                $result = (new AdminUser())->save($userinfo);
                if ($result){
                    return json(['code'=>0,'msg'=>'添加成功']);
                }else{
                    return json(['code'=>500,'msg'=>(new AdminUser())->getError()]);
                }
            }

        }

    }
}
