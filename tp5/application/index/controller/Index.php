<?php
namespace app\index\controller;

use app\admin\model\ArticleModel;
use think\Controller;

class Index extends Common
{
    public function index()
    {
        $article = ArticleModel::order('art_time','desc')->limit(4)->select();
        return $this->fetch('index/index',['article'=>$article]);
    }
}
