<?php

namespace app\admin\controller;

use app\admin\model\UserModel;
use think\Controller;
use think\Request;

class User extends Controller
{
    public function edit(Request $request)
    {
        if($request->isPost()){
            $input = input('post.');
            $user = Session('user');
            $data = UserModel::where('user_id',$user['user_id'])->find();
            if($input['user_pass'] != $input['user_two']){
                $this->error('两次密码不一致');
            }
            if($input['user_original'] != $data['user_pass']){
                $this->error('原密码错误');
            }
            $res = UserModel::Where('user_id',$data['user_id'])->strict(false)->update($input);
            if($res){
                $this->redirect('/admin/');
            }
        }
        return $this->fetch('user/edit');
    }

}
