<?php

namespace app\admin\controller;

use app\admin\model\AdminUser;
use think\captcha\Captcha;
use think\Controller;
use think\Loader;
use think\Request;
class FreeController extends Controller
{

    public function login(){
        if ($this->request->isAjax()) {
            $userInfo['username'] = $this->request->post('username');
            $userInfo['password'] = $this->request->post('password');
            $userInfo['vercode'] = $this->request->post('vercode');
            if (!empty( $userInfo['vercode'])){
                if(!captcha_check($userInfo['vercode'])){
                    return  json(['code'=>500,'msg'=>'验证码错误']);
                };
            }
            $UserModel= new AdminUser();
            $checkUser =   $UserModel->checkUser($userInfo['username'], $userInfo['password']);
            if ($checkUser){

                return json(['code'=>0,'msg'=>'登录成功']);
            }else{
                return json(['code'=>500,'msg'=>'密码错误']);
            }
        }

       return $this->fetch();
    }

 // 验证码
    public function verify(){
        $captcha = new Captcha();
        $captcha->useNoise = false;
        $captcha->useCurve = false;
        $captcha->length = 3;
        return  $captcha->entry();
    }
    public function  logout(){

        session(null);
        return json(['code'=>0,'msg'=>'注销成功']);
    }
    public function console(){
        return $this->fetch();
    }

    public function password(){
        return $this->fetch();
    }
    public function info(){
        return $this->fetch();
    }
}
