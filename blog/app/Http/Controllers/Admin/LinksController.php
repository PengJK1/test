<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Link;

class LinksController extends CommonController
{
    //get.admin/links 获取
    public function index()
    {
        $data = Links::orderBy('link_order','asc')->get();
        return view('admin.links.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $link = Links::find( $input['link_id'] );
        $link->link_order = $input['link_order'];
        $res = $link->update();
        if($res){
            $data = [
                'status'=>0,
                'msg'=>'友情链接排序更新成功',
            ];
        } else {
            $data = [
                'status'=>0,
                'msg'=>'友情链接排序更新失败，请稍后重试',
            ];
        }
        return $data;
    }

    //get.admin/links/create 添加
    public function create()
    {
        return view('admin.links.add');
    }

    //post.admin/links 添加提交
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'link_name'=>'required',
            'link_url'=>'required'
        ];
        $message = [
            'link_name.required'=>'链接名称不能为空',
            'link_url.required'=>'友情链接不能为空',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Links::create($input);
            if($res){
                return redirect('admin/links');
            } else {
                return back()->with('errors','友情链接填充失败，请稍后重试');
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //get.admin/links/{category}/edit 编辑
    public function edit($link_id)
    {
        $field = Links::find($link_id);
        return view('admin.links.edit',compact('field'));
    }

    //put.admin/links/{category} 更新
    public function update($link_id)
    {
        $input = Input::except('_token','_method');
        $res = Links::where('link_id',$link_id)->update($input);
        if($res) {
            return redirect('admin/links');
        } else {
            return back()->with('errors','友情链接信息更新失败，请稍后重试');
        }
    }

    //delete.admin/links/{category} 删除
    public function destroy($link_id)
    {
        $res = Links::where('link_id',$link_id)->delete($link_id);
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
