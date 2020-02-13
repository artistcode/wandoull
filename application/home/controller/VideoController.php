<?php
namespace app\home\controller;

use think\Controller;
use think\Db;
use think\Request;

class VideoController extends  CommonController{
    public function index(){
        $video = Db::name('video')->select();
        $this->assign('video',$video);
       return $this->fetch();
    }
    public function detail(){
        $this->fetch();
    }
}