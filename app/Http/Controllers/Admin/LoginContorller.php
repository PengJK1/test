<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources/org/code/vcode.class.php';

class LoginContorller extends CommonController
{
    public function login()
    {
        if($input = Input::all()){
            $_code = $_SESSION['code'];
            if(strtolower($input['code'])!=strtolower($_code)){
                return back()->with('msg','验证码错误');
            }
            $user = User::first();
            if($input['user_name'] != $user->user_name || $input['user_pass'] != Crypt::decrypt($user->user_pass) ){
                return back()->with('msg','用户名或者密码错误');
            }
            session(['user'=>$user]);
            return redirect('admin');
        } else {
            return view('admin.login');
        }
    }

    public function code()
    {
        $code = new \Vcode;
        $code->outimg();
    }

    public function quit()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }

    public function en()
    {
    	$str = "peng5652201";
    	var_dump(Crypt::encrypt($str));
    }

}
