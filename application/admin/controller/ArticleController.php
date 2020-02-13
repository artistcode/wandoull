<?php
namespace app\admin\controller;
use app\admin\model\Article;
use app\admin\model\SingleArticle;
use think\Controller;
use think\Db;
use think\Loader;
class ArticleController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function read()
    {
        $Article = new Article();
        if (isset($_GET['column_id'])) {
            $Article = $Article->where(sprintf('column_id=%s', input("get.column_id")));
        }

        $data = $Article->page(input("get.page"), input("get.limit"))->order('article_id desc')->select();
        $count = $Article->count();
        return json(array('code' => 0, 'msg' => "", 'data' => $data, 'count' => $count));
    }
    public function del()
    {
        $result = Article::get(input('post.'))->delete();
        if ($result) {
            return json(['code' => 0, 'msg' => '删除成功']);
        } else {
            return json(['code' => 500, 'msg' => '删除失败']);
        }
    }

    public function upd()
    {
        $Article = (new Article())->isUpdate(true)->save(input('post.'));
        if ($Article) {
            return json(['code' => 0, 'msg' => '更新成功']);
        } else {
            return json(['code' => 0, 'msg' => '删除成功']);
        }
    }
    public function save()
    {
        $res = (new Article())->save(input('post.'));
        if ($res) {
            return json(['code' => 0, 'msg' => '添加成功']);
        } else {
            return json(['code' => 500, 'msg' => '添加失败']);
        }
    }
}
