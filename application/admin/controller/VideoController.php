<?php

namespace  app\admin\controller;

use app\admin\model\Video;
use think\Controller;

class VideoController extends BaseController {
    public function read(){
        if (isset($_GET['video_id'])){
            $data  = (new Video())->find($_GET['video_id']);
            if ($data){
                return $data->toArray();
            }
        }
        $video_condition  = ['column_id'=>input('get.column_id')];
        $data = (new Video())->where($video_condition)->select();
        return  json($data);

    }
    public function  save(){
        $data= input("post.");
        $video = new Video();
        $res = $video->save($data);
        if ($res)
        {
            return json(['code'=>0,'msg'=>'添加成功']);

        }else{

            return json(['code'=>500,'msg'=>'添加失败']);
        }
    }

    public function del(){
        if (isset($_POST['video_id'])){
            $res  =Video::get($_POST['video_id'])->delete();
            if ($res){
                return '删除成功';
            }else{
                return  '删除失败';
            }
        }
    }

    public  function upd(){
        $data = input('post.');
        if (!empty($data)){
            $res  = (new Video())->isUpdate(true)->save($data);
            if ($res){
                return  '更新成功';

            }else{
                return '更新失败';
            }
        }
    }

}