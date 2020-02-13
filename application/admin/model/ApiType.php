<?php

namespace app\admin\model;

use think\Db;
use think\Model;
use function GuzzleHttp\json_encode;

class ApiType extends Model
{
    protected $pk  = 'api_type_id';
 protected static function init()
    {

        ApiType::event('after_insert', function ($data) {
            //  会员消耗大小
            $data = $data->toArray();
            foreach ($data['consume'] as &$item) {
                $item['api_type_id'] = $data['api_type_id'];
            }
            $consume = $data['consume'];
            $res =  (new Consume())->saveAll($consume);
            // api_字符映射
            foreach ($data['field'] as &$value) {
                 $value['api_type_id'] = $data['api_type_id'];
                 unset($value['field_id']);
                if(isset($value['price'])){
                    $value['price'] = json_encode($value['price']);
                }
                if(isset($value['validate'])){
                    $value['validate'] = json_encode($value['validate']);
                }
            }
            $field = $data['field'];
            $res_field = (new TaskField())->saveAll($field);
          });
        ApiType::event('after_update', function ($data) {
             //  会员消耗大小
            $data = $data->toArray();
            foreach ($data['consume'] as $key=>&$item) {
                $item['api_type_id'] = $data['api_type_id'];
                $data['consume'][$key] = array_filter($item);
            }
             (new Consume())->saveAll($data['consume']);
        // api_字符映射
            if (isset($data['field'])) {
                    foreach ($data['field'] as &$value) {
                         $value['api_type_id'] = $data['api_type_id'];
                         if (empty($value['field_id'])) {
                             unset($value['field_id']);
                         }
                        $value['api_type_id'] = $data['api_type_id'];
                        if(isset($value['price'])){
                            $value['price'] = json_encode($value['price']);
                        }
                        if(isset($value['validate'])){
                            $value['validate'] = json_encode($value['validate']);
                        }
                    }
                    $field = $data['field'];
                   (new TaskField())->saveAll($field);
            }



        });

    }


}
