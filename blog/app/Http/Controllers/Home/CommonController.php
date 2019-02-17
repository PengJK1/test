<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Links;
use App\Http\Model\Navs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct()
    {
/*        //点击量最高的文章 (点击排行)
        $hot = Article::orderBy('art_view','desc')->take(5)->get();

        //最新的文章 (最新文章)
        $new = Article::orderBy('art_time','desc')->take(4)->get();
*/
        //友情链接
        $links = Links::orderBy('link_order','asc')->get();

        //导航
        $navs = Navs::all();

        View::share('navs',$navs);
        View::share('links',$links);
/*        View::share('hot',$hot);
        View::share('new',$new);*/
        
    }
}
