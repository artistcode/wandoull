<?php

namespace app\task\controller;

use think\Controller;
use think\Request;

class TaobaoController extends BaseController
{
    public function  index(){
        return  $this->fetch();
    }
}
