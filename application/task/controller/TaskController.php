<?php

namespace app\task\controller;

use app\task\model\Task;
use think\Controller;
use think\Request;

class TaskController extends BaseController
{
   public function index(){
       return $this->fetch();
   }
   public function read(){
          $task   =  (new Task());
          $count =  $task->count();
         $data =   $task->page(input('get.page'),input('get.limit'))->order('task_id desc')->select();
      return json(['code'=>0,'msg'=>'数据返回成功','data'=>$data,'count'=>$count]);
   }
}
