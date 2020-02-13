<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用公共文件
function tree($list,$id_name,$alias = [],$child ='children' ){
    $build = [];
    foreach ($list as $item) {
        foreach ( $alias  as  $key=>$items) {
            if (isset($item[$key])){
                $build[$item[$id_name]][$items] = $item[$key];
            }else{
                // 附加字段
                $build[$item[$id_name]][$key] = $items;
            }
        }
    }
    $primary_key = isset($alias[$id_name]) ? $alias[$id_name] : $id_name;
    $tree = array();
    foreach($build as $item){
        if(isset($build[$item['pid']])){
            $build[$item['pid']][$child][] = &$build[$item[$primary_key]];
        }else{
            $tree[] = &$build[$item[$primary_key]];
        }
    }

    return $tree;
}
