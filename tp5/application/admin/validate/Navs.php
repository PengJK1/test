<?php
namespace app\admin\validate;

use think\Validate;

class Navs extends Validate
{
    protected $rule = [
        'nav_name'  => 'require',
    ];

    protected $message = [
        'nav_name.require' => '导航名称不能为空',
    ];
}
