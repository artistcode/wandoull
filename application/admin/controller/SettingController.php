<?php


namespace app\admin\controller;


class SettingController extends BaseController
{

    // 支付配置
    public function pay(){
        return $this->fetch();
    }
    // 任务消耗
    public function consume(){
        return $this->fetch();
    }
     // 佣金配置
    public function brokerage(){
        return $this->fetch();
    }
    public function website(){
        return $this->fetch();
    }
}
