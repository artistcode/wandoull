<?php

namespace app\admin\controller;

use app\admin\model\Single;
use think\Controller;
use think\Db;
use think\Loader;
class SingleController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function read()
    {
        $Single = new Single();
        $data = $Single->get(['column_id'=>input("get.column_id")]);
        return  json(['code'=>0,'msg'=>'fff','data'=>$data]);

    }
    public function del()
    {
        $result = Single::get(input('post.'))->delete();
        if ($result) {
            return json(['code' => 0, 'msg' => '删除成功']);
        } else {
            return json(['code' => 500, 'msg' => '删除失败']);
        }
    }

    public function upd()
    {

    }

    public function save()
    {
        if(isset($_POST['single_id'])){
            $Single = (new Single())->isUpdate(true)->save(input('post.'));
            if ($Single) {
                return json(['code' => 0, 'msg' => '更新成功']);
            } else {
                return json(['code' => 0, 'msg' => '删除成功']);
            }
        }
        $res = (new Single())->save(input('post.'));
        if ($res) {
            return json(['code' => 0, 'msg' => '添加成功']);
        } else {
            return json(['code' => 500, 'msg' => '添加失败']);
        }
    }
}
