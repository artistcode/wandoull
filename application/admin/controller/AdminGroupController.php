<?php

namespace app\admin\controller;

use app\admin\model\AdminGroup;
use think\Controller;
use think\Request;
use think\Validate;

class AdminGroupController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function read()
    {
        $model = new AdminGroup();
        $data = $model->page(input('get.page', input('get.limit')))->select();
        return json(['code' => 0, 'msg' => '数据返回成功', 'data' => $data]);
    }

    public function save()
    {
        $data = (new  AdminGroup())->save(input('post.'));
        if ($data) {
            return json(['code' => 0, 'msg' => '添加成功']);
        } else {
            return json(['code' => 500, 'msg' => '添加失败']);
        }

    }

    public function upd()
    {
        $data = (new  AdminGroup())->isUpdate(true)->save(input('post.'));
        if ($data) {
            return json(['code' => 0, 'msg' => '更新成功']);
        } else {
            return json(['code' => 500, 'msg' => '更新失败']);
        }

    }
    public function  del(){
        $result =AdminGroup::get(input('post.'))->delete();
        if($result){
            return json(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json(['code'=>500,'msg'=>'删除失败']);
        }
    }
}
