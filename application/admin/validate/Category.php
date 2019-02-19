<?php
namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'cate_name'  => 'require',

    ];

    protected $message = [
        'cate_name.require' => '导航名称不能为空',
    ];
}
