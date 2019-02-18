<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'user_original' => 'require',
        'user_pass'  => 'require',
        'user_two'  => 'require',
    ];

    protected $message = [
        'user_original.require' => '管理员原密码不能为空',
        'user_pass.unique'  => '管理员新密码不能为空',
        'user_two.require' => '再次输入的密码不能为空',
    ];
}
