<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\ApiParameter;
use think\Validate;
class ApiParameterController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function read(){
        $ApiParameter  = (new ApiParameter());
        if (isset($_GET['api_type_id'])){
            $ApiParameter = $ApiParameter->where('w_api_parameter.api_type_id='.$_GET['api_type_id']);
        }
        $ApiParameter = $ApiParameter->order('w_api_parameter.parameter_id desc');
        $count  = $ApiParameter->count();
        $ApiParameter  = $ApiParameter->page(input('get.page').','.input('get.limit'))->select();
        return json(['code' => 0, 'msg' => '数据返回成功','count'=>$count,'data'=>$ApiParameter]);
    }
    public function save()
    {
        $data = (new  ApiParameter())->save(input('post.'));
        if ($data) {
            return json(['code' => 0, 'msg' => '添加成功']);
        } else {
            return json(['code' => 500, 'msg' => '添加失败']);
        }
    }
    public function  del(){
        $result =ApiParameter::get(input('post.'))->delete();
        if($result){
            return json(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json(['code'=>500,'msg'=>'删除失败']);
        }
    }
    public function upd()
    {
        $data = (new  ApiParameter())->isUpdate(true)->save(input('post.'));
        if ($data) {
            return json(['code' => 0, 'msg' => '更新成功']);
        } else {
            return json(['code' => 500, 'msg' => '更新失败']);
        }
    }
}
