<?php

namespace app\admin\validate;

use think\Validate;

class AdminUser extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'admin_nickname' => 'require|length:4,25',
        'email' => 'email',
        'admin_account' => 'unique:admin_user|length:4,25',
        'admin_passwd' => 'require|confirm:repasswd',
    ];
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [
        'admin_nickname.require' => '名称必须',
        'admin_nickname.length' => '昵称长度不符合要求',
        'admin_passwd.require' => '密码必填',
        'admin_passwd.confirm' => '两次密码不一致',
        'admin_account.unique' => '用户名已经存在',
        'admin_account.length' => '账号不符合要求4,25之间',
    ];
}
