<?php

namespace app\task\controller;

use think\Controller;
use think\Request;

class JdController extends BaseController
{
   public function index(){
       return $this->fetch();
   }
}
