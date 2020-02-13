<?php

namespace app\admin\controller;

use app\admin\model\TaskColumn;
use think\Controller;

class TaskColumnController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function read()
    {
        $TaskColumn = new TaskColumn();

        $data = $TaskColumn->field('w_task_column.*,w_content_module.module_name');
          $data =  $data->order('sort asc ')->leftJoin('w_content_module','w_content_module.module_id=w_task_column.module_id');
            if(isset($_GET['where'])){
               $data = $data->where(input('get.where'));
          }
          $data =  $data->select();
        return json(array('code' => 0, 'msg' => "", 'data' => $data, 'count' => 100));
    }
    public function tree()
    {
        $children = isset($_GET['type']) ? 'children'  : 'list';
        $id= isset($_GET['type']) ? 'id'  : 'value';
        $data = (new TaskColumn())->order('sort asc')->select()->toArray();
        $build = [];
        $checked = $this->request->get("checked");

        if (isset($_GET['sidebar'])) {
            $alias = ['task_column_name' => 'title', 'task_column_parent' => 'pid', 'task_column_id' => 'id','module_id'=>'module_id','type'=>'task_column'];
            $tree_list = tree($data, 'task_column_id', $alias);

            return json($tree_list);
        }
        foreach ($data as $item) {
            $build[$item['task_column_id']][$id] = $item['task_column_id'];
            $build[$item['task_column_id']]['pid'] = $item['task_column_parent'];
            $build[$item['task_column_id']]['name'] = $item['task_column_name'];
            if (!empty($checked)){
                if ( in_array($item['task_column_id'], explode(',', $checked))){
                    $build[$item['task_column_id']]['checked'] =true;
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
        $result =TaskColumn::get(input('post.'))->delete();
        if($result){
            return json(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json(['code'=>500,'msg'=>'删除失败']);
        }
    }
    public function upd(){
        $TaskColumn = (new TaskColumn())->isUpdate(true)->save(input('post.'));
        if ($TaskColumn){
            return  json(['code'=>0,'msg'=>'更新成功']);
        }else{
            return  json(['code'=>0,'msg'=>'删除成功']);
        }
    }
    public function save(){
       $res =  (new TaskColumn())->save(input('post.'));
       if ($res){
           return json(['code'=>0,'msg'=>'添加成功']);
       }else{
           return json(['code'=>500,'msg'=>'添加失败']);
       }
    }
}
