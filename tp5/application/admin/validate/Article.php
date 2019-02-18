<?php
namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'art_title'  => 'require',
        'art_content'  => 'require',

    ];

    protected $message = [
        'art_title.require' => '文章标题不能为空',
        'art_content.require' => '文章内容不能为空',
    ];
}
