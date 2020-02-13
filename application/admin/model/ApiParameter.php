<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class ApiParameter extends Model
{
    protected $pk  = 'parameter_id';
   /* protected static function init()
    {
        Single::event('before_insert', function ($article) {
            $article->single_content  = str_replace('../../','/',$article->single_content);
        });
        Single::event('before_update', function ($article) {
            $article->single_content  = str_replace('../../','/',$article->single_content);
        });
    }*/


}
