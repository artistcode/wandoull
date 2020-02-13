<?php

namespace app\home\validate;

use think\Validate;

class Free extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'phone'=>"require|mobile|unique:member"
        ,'pwd' => 'require|confirm:repassword'
    ];
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [
        'phone.mobile'=>"手机号码格式错误"
        ,'phone.require'=>"手机号必填"
        ,'phone.unique'=>"手机好已经被注册"
        ,'password.require'=>"密码必填"
        ,'password.confirm'=>"两次密码不一致"
    ];

}
