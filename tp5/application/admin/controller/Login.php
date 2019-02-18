<?php
namespace app\admin\controller;

use app\admin\model\UserModel;
use think\Controller;
use think\Request;
use think\captcha\Captcha;
use think\Facade\Session;

class Login extends Controller
{
	public function index(Request $request)
	{
		if($request->isPost()){
			$data = input('post.');
			$validate = Validate('Login');
			if(!$validate->check($data)){
				return redirect('/admin/login')->with('error',$validate->getError());
			}
			$captcha = new Captcha();
			$result=$captcha->check($data['user_code']);
			if(!$result){
				return redirect('/admin/login')->with('error','验证码错误');
			}
			$user = UserModel::where('user_name',$data['user_name'])->find();
			if($user['user_name']!=$data['user_name'] || $user['user_pass'] != $data['user_pass']){
				return redirect('/admin/login')->with('error','账号或密码错误');
			}
			Session::set('user',$user);
			$this->redirect('/admin/');
		}
		return $this->fetch('login');
	}

	public function CodeConfig()
	{
		$captcha = new Captcha();
		$captcha->imageW= 220;
		$captcha->imageH = 34;  //图片高
		$captcha->fontSize =14;  //字体大小
		$captcha->length   = 4;  //字符数
		$captcha->fontttf = '5.ttf';  //字体
		$captcha->expire = 300;  //有效期
		$captcha->useNoise = true;  //不添加杂点
		return $captcha->entry();
	}

	public function quit()
	{
		Session::set('user',null);
		return redirect('/admin/login');
	}

}
