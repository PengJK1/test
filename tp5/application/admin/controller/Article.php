<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\ArticleModel;
use app\admin\model\CategoryModel;
use think\Validate;

class Article extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = ArticleModel::join('category','category.cate_id = article.cate_id')->order('art_time','desc')->paginate(5);
        //dump($data);die;
        return $this->fetch('article/list',['data'=>$data]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //这里还需要分类表的数据
        $cate = (new CategoryModel)->tree();
        return $this->fetch('article/add',['data'=>$cate]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if($request->isPost()){
            $data = input('post.');
            $data['art_time'] = time();
            $validate = Validate('Article');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $res = ArticleModel::create($data);
            if($res){
                $this->redirect('/admin/art');
            }
        }
        return $this->redirect('/admin/art/create');
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $cate = (new CategoryModel)->tree();
        $field = ArticleModel::where('art_id',$id)->find();
        return $this->fetch('article/edit',['cate'=>$cate,'field'=>$field]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        if($request->isPut()){
            $data = input('put.');
            $validate = Validate('Article');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $res = ArticleModel::Where('art_id',$id)->strict(false)->update($data);
            if($res){
                $this->redirect('/admin/art');
            }
        }
        return $this->redirect('/admin/art/'.$id.'/edit');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $res = ArticleModel::where('art_id',$id)->delete($id);
        if($res){
            $data = [
                'status' => 0,
                'msg' => '文章删除成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '文章删除失败',
            ];
        }
        return $data;
    }
}
