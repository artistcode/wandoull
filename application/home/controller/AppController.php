<?php

namespace app\home\controller;


use think\Controller;
use think\Db;
class AppController extends CommonController
{
    public function index()
    {
        $item_condition['item'] =1;
        $article  = Db::name('article')->where($item_condition)->select();
        $item_column_id = array_unique(array_column($article,'column_id'));
        if (!empty($item_column_id)){
            $item_column= Db::name('column')->where(sprintf('column_id =%s',join(',',$item_column_id)))
                ->select();
            $column = [];
            foreach ($item_column as $key=>$item) {
                $column[$item['column_id']] = $item;
            }
            foreach ($article as $item) {
                $column[$item['column_id']]['article'][] = $item;
            }
        }
        $this->assign('item_article',$article);
        $video = Db::name('video')->where('status=2')->select();
        $this->assign('video',$video);
        return $this->fetch();
    }
    public function detail(){
        return $this->fetch();
    }
}
