<?php
namespace app\admin\validate;

use think\Validate;

class Login extends Validate
{
    protected $rule = [
        'user_name'  => 'require',
        'user_pass'  => 'require',
        'user_code'  => 'require',
    ];

    protected $message = [
        'user_name.require' => '管理员账号不能为空',
        'user_pass.require' => '管理员密码不能为空',
        'user_code.require' => '验证码不能为空',
    ];
}
