<?php

namespace app\admin\model;

use think\Model;

class AdminGroup extends Model
{
    protected $pk = 'admin_group_id';
    protected static function init()
    {
        AdminGroup::beforeInsert(function ($group) {
            $group->menu_id_list = join(',',  $group->menu_id_list);
        });
        AdminGroup::beforeUpdate(function ($group) {
            $group->menu_id_list = join(',',  $group->menu_id_list);
        });
    }
}
