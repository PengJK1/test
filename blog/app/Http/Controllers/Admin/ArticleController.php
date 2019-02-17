<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    //get.admin/article 获取
    public function index()
    {
        $data = Article::orderBy('art_id','desc')->paginate(5);
        return view('admin.article.index',compact('data'));
    }

    //get.admin/article/create
    public function create()
    {
        $data = (new Category)->tree();
        return view('admin.article.add',compact('data'));
    }

    //post.admin/article 添加提交
    public function store()
    {
        $input = Input::except('_token','fileselect');
        $input['art_time'] = time();
        $rules = [
            'art_title'=>'required',
            'art_content'=>'required'
        ];
        $message = [
            'art_title.required'=>'文章标题不能为空',
            'art_content.required'=>'文章内容不能为空',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Article::create($input);
            if($res){
                return redirect('admin/article');
            } else {
                return back()->with('errors','数据填充失败，请稍后重试');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    //get.admin/article/{category}/edit 编辑
    public function edit($art_id)
    {
        $field = Article::find($art_id);
        $data = (new Category)->tree();
        return view('admin.article.edit',compact('field','data'));
    }

    //put.admin/article/{category} 更新
    public function update($art_id)
    {
        $input = Input::except('fileselect','_token','_method');
        $res = Article::where('art_id',$art_id)->update($input);
        if($res) {
            return redirect('admin/article');
        } else {
            return back()->with('errors','文章信息更新失败，请稍后重试');
        }
    }

    //delete.admin/article/{category} 删除
    public function destroy($art_id)
    {
        $res = Article::where('art_id',$art_id)->delete($art_id);
        if($res){
            $data = [
                'status' => 0,
                'msg' => '文章删除成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '文章删除失败，请稍后重试',
            ];
        }
        return $data;
    }


    public function show()
    {
        
    }
}
