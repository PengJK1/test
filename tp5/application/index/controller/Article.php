<?php
namespace app\index\controller;

use app\admin\model\ArticleModel;
use app\admin\model\CategoryModel;

class Article extends Common
{
    public function index($id=1)
    {
        $data = ArticleModel::order('art_time','desc')->page($id,8)->select();
        return $this->fetch('article/article',['data'=>$data]);
    }
}
