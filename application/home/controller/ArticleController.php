<?php

namespace app\home\controller;

use app\admin\model\Column;
use think\Controller;
use think\Db;
use think\Request;

class ArticleController extends CommonController
{
    public function index()
    {
        $column_id =input('column_id');
        $article = Db::name('article');
        if(isset($column_id)){
            $cat = Db::name('column')->leftJoin(' w_content_module', 'w_column.module_id=w_content_module.module_id')->where(sprintf('w_column.column_id = %s or column_parent= %s',input('column_id'),input('column_id')))->select();
            $cats = [];
            foreach ($cat as $item) {
                $cats[$item['column_id']] = $item;
            }
            $this->assign('cat',$cats);
            $column_id_list =join(',', array_column($cat,'column_id'));
           $article =  $article ->where(sprintf('column_id in(%s)',$column_id_list));
        }else{
            $this->assign('cat', []);

        }
         $count  = $article->count();
        $list = $article->page(input('get.page'),input('get.limit'))->paginate(10,$count);
        $page = $list->render();
        $this->assign('article', $list);
        $this->assign('page', $page);
        return $this->fetch();
    }
    public function detail(){
            $article = Db::name('article')->find(input("article_id"));
        $cat = Db::name('column')->leftJoin(' w_content_module', 'w_column.module_id=w_content_module.module_id')->where(sprintf('w_column.column_id = %s or column_parent= %s',input('column_id'),input('column_id')))->select();
        $cats = [];
        foreach ($cat as $item) {
            $cats[$item['column_id']] = $item;
        }
        $this->assign('cat',$cats);
        $this->assign('article',$article);
        return $this->fetch();
    }

    public function single(){
        $article  =Db::name('article')->where('column_id='.input('column_id'))->find();
        $this->assign('article',$article);
       return   $this->fetch();

    }

}
