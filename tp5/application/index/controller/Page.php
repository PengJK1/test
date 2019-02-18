<?php
namespace app\index\controller;


use app\admin\model\ArticleModel;

class Page extends Common
{
    public function index($id)
    {
        $article = ArticleModel::join('category','category.cate_id = article.cate_id')->where('art_id',$id)->find();

        ArticleModel::where('art_id',$id)->setInc('art_view',1);
        $article['pre'] = ArticleModel::where('art_id','<',$id)->order('art_id','desc')->find();
        $article['next'] = ArticleModel::where('art_id','>',$id)->order('art_id','asc')->find();

        return $this->fetch('page/page',['article'=>$article]);
    }
}
