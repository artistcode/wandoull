<?php
namespace app\home\controller;

use think\Controller;
use think\Db;
use think\Request;

class SingleController extends  CommonController{
    public function index(){
        $Single = Db::name('single');
        $column_id = input('column_id');
        if(!empty($column_id)){
            $Single = $Single->where(['column_id'=>$column_id]);
        }
        $Single = $Single->find();
        $this->assign('single',$Single);
       return $this->fetch();
    }
    public function detail(){
        $this->fetch();
    }
}
