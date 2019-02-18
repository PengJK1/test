<?php
namespace app\admin\validate;

use think\Validate;

class Links extends Validate
{
    protected $rule = [
        'link_name'  => 'require',
    ];

    protected $message = [
        'link_name.require' => '导航名称不能为空',
    ];
}
