<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class ApiFirm extends Model
{
    protected $pk  = 'api_firm_id';
     protected static function init()
    {
        ApiFirm::event('before_insert', function ($data) {
            $data->api_public_parameter  = json_encode($data->common);
        });
 ApiFirm::event('before_update', function ($data) {
            $data->api_public_parameter  = json_encode($data->common);
        });
    }


}
