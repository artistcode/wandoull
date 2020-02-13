<?php

namespace app\admin\controller;

use app\admin\model\AdminUser;
use think\captcha\Captcha;
use think\Controller;
use think\Loader;
use think\Request;

class FileController extends BaseController
{
    public function  index(){
        return $this->fetch();
    }
    public function read(){
        $file_list = array();
        $this->dir_list($file_list,'./upload');
        if ($this->request->get('dir')){
            $file_list = array();
            $this->dir_list($file_list,'./upload'.input('get.dir'));
        }

        return json(['msg'=>'查询成功','code'=>200,'data'=>$file_list]);
    }
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        if (isset($_FILES['file'])){
            $file = request()->file('file');
        }else{
            $file =request()->file('edit');
        }
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move('./upload');
            if($info){
                if (isset($_FILES['edit'])){
                    return json(['code'=>0,'msg'=>'上传成功','data'=>['location'=>$info->getSaveName()]]);
                }
                return json(['code'=>0,'msg'=>'上传成功','data'=>['src'=>$info->getSaveName()]]);
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }


    public  function dir_list(&$arr_file, $directory, $dir_name='')
    {
       $direy = dir($directory);
        $i = 0;
        while($file = $direy->read())
        {
            if(($file != ".") AND ($file != ".."))
            {
                if (!is_dir("$directory/$file")) {
                    if (isset(pathinfo($file)['extension'])){
                        $arr_file[$i]['type']= in_array(pathinfo($file)['extension'],['jpg','png']) ?  'file' : pathinfo($file)['extension'];
                    }
                }
                $arr_file[$i]['name'] =pathinfo($file)['filename'];
                $arr_file[$i]['updateTime'] =fileatime("$directory/$file");
                $arr_file[$i]['url']=ltrim("$directory/$file",'.');
                $arr_file[$i]['isDir']=is_dir("$directory/$file");
                $i=$i+1;
            }

        }

        $direy->close();
    }

    public function del(){
        unlink(sprintf('.%s',input('post.path')));
    }



}
