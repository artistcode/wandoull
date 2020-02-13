<?php

namespace app\admin\controller;

use app\admin\model\Column;
use think\Controller;
use think\Db;

class ColumnController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function read()
    {
        $Column = new Column();
        $data = $Column->leftJoin('w_content_module','w_content_module.module_id=w_column.module_id')->select();
        return json(array('code' => 0, 'msg' => "", 'data' => $data, 'count' => 100));
    }

    public function tree()
    {
        $data = (new Column())->select()->toArray();

        if (isset($_GET['type']) && !empty($_GET['type'])) {
            foreach ($data as $key => $item) {
                if (($item['column_id'] == $_GET['type']) || ($item['column_parent'] == $_GET['type'])) {
                    unset($data[$key]);
                }
            }

        }
        if (isset($_GET['sidebar'])) {
            $alias = ['column_name' => 'title', 'column_parent' => 'pid', 'column_id' => 'id', 'module_id' => 'module_id','type'=>'column'];
            $tree_list = tree($data, 'column_id', $alias);
            return json($tree_list);
        }

        if (isset($_GET['select'])) {
            $alias = ['column_name' => 'name', 'column_parent' => 'pid', 'column_id' => 'id'];
            $tree_list = tree($data, 'column_id', $alias);
            if ($_GET['select'] == 12){
                array_unshift($tree_list, ['name' => '首页', 'pid' => 0, 'id' => 0]);
            }else{
                array_unshift($tree_list, ['name' => '顶级栏目', 'pid' => 0, 'id' => 0]);
            }
            return json($tree_list);
        }

    }

    public function del()
    {
        $data = input('post.');
        $res = Db::name('single_article')->where(['column_id' => $data['column_id']])->find();
        $result = Column::get(input('post.'))->allowfield(true)->delete();
        if ($result) {
            return json(['code' => 0, 'msg' => '删除成功']);
        } else {
            return json(['code' => 500, 'msg' => '删除失败']);
        }
    }

    public function upd()
    {
        $data = input('post.');

        $Column = (new Column())->isUpdate(true)->save($data);
        if ($Column) {
            return json(['code' => 0, 'msg' => '更新成功']);
        } else {
            return json(['code' => 0, 'msg' => '删除成功']);
        }
    }

    public function save()
    {
        $res = (new Column())->save(input('post.'));
        if ($res) {
            return json(['code' => 0, 'msg' => '添加成功']);
        } else {
            return json(['code' => 500, 'msg' => '添加失败']);
        }
    }
}
