<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends CommonController
{
    //get.admin/navs 获取
    public function index()
    {
        $data = Navs::orderBy('nav_order','asc')->get();
        return view('admin.navs.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $nav = Navs::find( $input['nav_id'] );
        $nav->nav_order = $input['nav_order'];
        $res = $nav->update();
        if($res){
            $data = [
                'status'=>0,
                'msg'=>'导航排序更新成功',
            ];
        } else {
            $data = [
                'status'=>0,
                'msg'=>'导航排序更新失败，请稍后重试',
            ];
        }
        return $data;
    }

    //get.admin/navs/create 添加
    public function create()
    {
        return view('admin.navs.add');
    }

    //post.admin/navs 添加提交
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'nav_name'=>'required',
            'nav_url'=>'required'
        ];
        $message = [
            'nav_name.required'=>'导航链接名称不能为空',
            'nav_url.required'=>'导航链接不能为空',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Navs::create($input);
            if($res){
                return redirect('admin/navs');
            } else {
                return back()->with('errors','自定义导航填充失败，请稍后重试');
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //get.admin/navs/{category}/edit 编辑
    public function edit($nav_id)
    {
        $field = Navs::find($nav_id);
        return view('admin.navs.edit',compact('field'));
    }

    //put.admin/navs/{category} 更新
    public function update($nav_id)
    {
        $input = Input::except('_token','_method');
        $res = Navs::where('nav_id',$nav_id)->update($input);
        if($res) {
            return redirect('admin/navs');
        } else {
            return back()->with('errors','友情链接信息更新失败，请稍后重试');
        }
    }

    //delete.admin/navs/{category} 删除
    public function destroy($nav_id)
    {
        $res = Navs::where('nav_id',$nav_id)->delete($nav_id);
        if($res){
            $data = [
                'status' => 0,
                'msg' => '友情链接删除成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '友情链接删除失败，请稍后重试',
            ];
        }
        return $data;
    }

    public function show()
    {
        
    }
}
