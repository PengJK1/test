<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;

class IndexController extends CommonController
{
	public function index()
	{
		//最新推荐
		$data = Article::orderBy('art_time','desc')->take(4)->get();

		return view('home.index',compact('data'));
	}

	public function cate()
	{
		$data = Article::orderBy('art_time','desc')->paginate(8);
		/*Category::where('cate_id',$cate_id)->increment('cate_view');
		$submenu = Category::where('cate_pid',$cate_id)->get();
		$field = Category::find($cate_id);*/
		return view('home.list',compact('data'));
	}

	public function article($art_id)
	{
		$field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
		//查看次数
		Article::where('art_id',$art_id)->increment('art_view');
		//上下篇
		$article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
		$article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();
		//相关文章
		$data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();
		return view('home.article',compact('field','article','data'));
	}
}
