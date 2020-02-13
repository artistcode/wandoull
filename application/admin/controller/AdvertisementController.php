<?php

namespace app\admin\controller;

use app\admin\model\Advertisement;
use think\Controller;
use think\Request;
use think\Validate;

class AdvertisementController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function read()
    {
        $model = new Advertisement();
        $data = $model->leftJoin('w_column','w_advertising.column_id =w_column.column_id ')->page(input('get.page'),input('get.limit'))->select();
        $count  =$model->count();
        return json(['code' => 0, 'msg' => '数据返回成功', 'data' =>$data,'count'=>$count]);
    }
    public function save()
    {
        /** @var TYPE_NAME $data */
        $data = (new  Advertisement())->save(input('post.'));
        if ($data) {
            return json(['code' => 0, 'msg' => '添加成功']);
        } else {
            return json(['code' => 500, 'msg' => '添加失败']);
        }

    }
    public function upd()
    {
        $data = (new  Advertisement())->isUpdate(true)->save(input('post.'));
        if ($data) {
            return json(['code' => 0, 'msg' => '更新成功']);
        } else {
            return json(['code' => 500, 'msg' => '更新失败']);
        }

    }
    public function  del(){
        $result =Advertisement::get(input('post.'))->delete();
        if($result){
            return json(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json(['code'=>500,'msg'=>'删除失败']);
        }
    }
}
