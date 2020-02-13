<?php

namespace app\admin\controller;

use app\admin\model\Consume;
use app\admin\model\MemberLevel;
use think\Controller;
use think\Request;
use app\admin\model\ApiType;
use app\admin\model\TaskField;
use think\Validate;
class ApiTypeController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function read(Request $request)
    {
        $ApiType = (new ApiType());
        $count = $ApiType->count();
        if (isset($_GET['where'])){
            $ApiType= $ApiType->where($_GET['where']);
        }
        $ApiType = $ApiType->order('api_type_id asc')->select();
        $path = explode('/',$request->pathinfo());
        if(in_array('tree',$path)){
         $alias = ['api_type_name' => 'name', 'api_type_parent' => 'pid', 'api_type_id' => 'value'];
            $data = tree($ApiType->toArray(),'api_type_id',$alias);
            array_unshift($data,['value'=>0,'pid'=>'0','name'=>'顶级']);
            return $data;
        }
            return json([
            'code'  => 0,
            'msg'   => '数据返回成功',
            'count' => $count,
            'data'  => $ApiType
        ]);
    }
    public function save()
    {
        $data = (new  ApiType())->save(input('post.'));
        if ($data) {
            return json(['code' => 0, 'msg' => '添加成功']);
        } else {
            return json(['code' => 500, 'msg' => '添加失败']);
        }
    }

    public function consume(Request $request){
        $where = $request->param('where');
        $data = (new Consume)->where($where)->select();
        return  json(['code'=>0,'msg'=>'','data'=>$data]);
    }

    public function task_field(Request $request){
          $where = $request->param('where');
      $data = (new TaskField)->where($where)->select();
        return  json(['code'=>0,'msg'=>'','data'=>$data]);
    }
    public function task_field_del(){
            $result = TaskField::get(input('post.'));
        $result = $result->delete();
        if ($result) {
            return json(['code' => 0, 'msg' => '删除成功']);
        } else {
            return json(['code' => 500, 'msg' => '删除失败']);
        }
    }
    public function del()
    {
        $result = ApiType::get(input('post.'));
        $result = $result->delete();
        if ($result) {
            return json(['code' => 0, 'msg' => '删除成功']);
        } else {
            return json(['code' => 500, 'msg' => '删除失败']);
        }
    }

    public function upd()
    {
        $data = (new  ApiType())->isUpdate(true)->save(input('post.'));
        if ($data) {
            return json(['code' => 0, 'msg' => '更新成功']);
        } else {
            return json(['code' => 500, 'msg' => '更新失败']);
        }

    }
}
