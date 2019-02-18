<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
	protected $middleware = ['Login'];

    public function index()
    {
        return $this->fetch('index');
    }
}
