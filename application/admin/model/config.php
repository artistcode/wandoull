<?php

namespace app\admin\model;

use think\Db;
use think\Model;
class config extends Model
{
    protected $pk = 'config_id';
    protected static function init()
    {
    self::event('after_insert', function ($data) {
       $data =   $data->toArray();
        foreach ($data['field'] as &$datum) {
            $datum['config_id'] = $data['config_id'];
        }
       if(!(new ConfigField())->saveAll($data['field'])){
           return false;
       }
     });
        self::event('after_update', function ($data) {
            $data =   $data->toArray();
            foreach ($data['field'] as &$datum) {
                $datum['config_id'] = $data['config_id'];
            }
            if(!(new ConfigField())->saveAll($data['field'])){
                return false;
            }
        });
    }



}
