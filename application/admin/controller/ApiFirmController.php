<?php

namespace app\admin\controller;

use app\admin\model\AdminGroup;
use app\admin\model\ApiFirm;
use think\Controller;
use think\Request;
use think\Validate;
class ApiFirmController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function read()
    {
        $Api = (new ApiFirm());
        $Api = $Api->select();
        $count = $Api->count();
        return json(['code' => 0, 'msg' => '数据返回成功', 'count' => $count, 'data' => $Api]);
    }


    public function save()
    {
        $data = (new  ApiFirm())->save(input('post.'));
        if ($data) {
            return json(['code' => 0, 'msg' => '添加成功']);
        } else {
            return json(['code' => 500, 'msg' => '添加失败']);
        }

    }



    public function del()
    {
        $result = ApiFirm::get(input('post.'))->delete();
        if ($result) {
            return json(['code' => 0, 'msg' => '删除成功']);
        } else {
            return json(['code' => 500, 'msg' => '删除失败']);
        }
    }

    public function upd()
    {
        $data = (new  ApiFirm())->isUpdate(true)->save(input('post.'));
        if ($data) {
            return json(['code' => 0, 'msg' => '更新成功']);
        } else {
            return json(['code' => 500, 'msg' => '更新失败']);
        }

    }

    public function test1(){

       echo json_encode($_GET);
    }
    public function test(){
        $data = [
            'username'=>'13710309387',
            'id'=> date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT),
            'count'=>1,
            'hour'=>'0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0',
            'begin_time'=>'',
            'type'=>''
            ,'target'=>'',
            'keyword'=>'',
            'format'=>'',
            'timestamp'=>'',
            'ver'=>'',
            'signkey'=>''
        ];
    }
    public static function https_request($curl, $data = null, $method = 'post')
    {
        $ch = curl_init();//初始化
        if ($method == 'get' && !empty($data)){
            $curl = sprintf('%s?%s',$curl,http_build_query($data));
        }
            curl_setopt($ch, CURLOPT_URL, $curl);//设置访问的URL
            curl_setopt($ch, CURLOPT_HEADER, false);//设置不需要头信息
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//只获取页面内容，但不输出
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//不做服务器认证
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//不做客户端认证
        if ($method == 'post') {
            curl_setopt($ch, CURLOPT_POST, true);//设置请求是POST方式
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//设置POST请求的数据
        }
        $str = curl_exec($ch);//执行访问，返回结果
        curl_close($ch);//关闭curl，释放资源
        return $str;
    }
}
