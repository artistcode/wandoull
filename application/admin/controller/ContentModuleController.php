<?php

namespace app\admin\controller;

use app\admin\model\ContentModule;
use think\Controller;
use think\Db;
use think\Request;

class ContentModuleController extends Controller
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

    public function read()
    {
        $data = (new ContentModule())->page(input('get.page'), input('get.limit'))->select();
        return json(['code' => 0, 'msg' => '数据返回成功', 'count' => (new ContentModule())->count(), 'data' => $data]);
    }
    public function save(){
        $res =  (new ContentModule())->save(input('post.'));
        if ($res){
            return json(['code'=>0,'msg'=>'添加成功']);
        }else{
            return json(['code'=>500,'msg'=>'添加失败']);
        }
    }


    public function  del(){
        $result =ContentModule::get(input('post.'))->allowfield(true)->delete();
        if($result){
            return json(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json(['code'=>500,'msg'=>'删除失败']);
        }
    }
    public function upd(){
        $ContentModule = (new ContentModule())->isUpdate(true)->save(input('post.'));
        if ($ContentModule){
            return  json(['code'=>0,'msg'=>'更新成功']);
        }else{
            return  json(['code'=>0,'msg'=>'删除成功']);
        }
    }
    public function template(){
        if (isset($_GET['type']) && !empty($_GET['type'])){
            switch ($_GET['type']){
                case  'column':
                    if (isset($_GET['module_id'])){
                        $data = ContentModule::get($_GET['module_id']);
                        if ($data){
                            $data->toArray();
                            if (!empty($data['form_template'])){
                                return $this->fetch('/component/'.$data['form_template']);
                            }else{
                                return  '表单模块不存在';
                            }
                        }
                    }
                    break;
                case 'task_column':
                    $data = ContentModule::get($_GET['module_id']);
                    var_dump($data);
                    break;
                default:
                    return '错误模板不存在';
            }
        }
    }
   
}
