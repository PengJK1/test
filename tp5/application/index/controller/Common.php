<?php
namespace app\index\controller;

use app\admin\model\LinksModel;
use app\admin\model\NavsModel;
use think\Controller;
use think\facade\View;

class Common extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $navs = NavsModel::order('nav_order','asc')->select();
        $links = LinksModel::order('link_order','asc')->select();
        View::share('navs',$navs);
        View::share('links',$links);
    }
}
