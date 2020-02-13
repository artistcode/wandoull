<?php

namespace app\admin\controller;

use app\admin\model\ContentModule;
use think\Controller;
use think\Loader;
use think\Request;

class ContentController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch();
    }


}
