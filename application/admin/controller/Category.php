<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Validate;
use app\admin\model\CategoryModel;

class Category extends Controller
{

    /*
     * index get 列表
     * save post 添加提交
     * create get 添加
     * read get
     * edit get 编辑
     * update put 更新
     * delete delete 删除
     */

    //显示资源列表
    public function index()
    {
        $data = (new CategoryModel)->tree();
        //dump($data);die;
        //$category = CategoryModel::order('cate_order','asc')->select();
        return $this->fetch('category/list',['data'=>$data]);
    }

    //显示创建资源表单页
    public function create()
    {
        $data = (new CategoryModel)->tree();
        return $this->fetch('category/add',['data'=>$data]);
    }

    //保存新建的资源
    public function save(Request $request)
    {
        if($request->isPost()){
            $data = input('post.');
            $validate = Validate('Category');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $res = CategoryModel::create($data);
            if($res){
                $this->redirect('/admin/cate');
            }
        }
        return $this->fetch('category/add');
    }

    //显示编辑资源表单页
    public function edit($id)
    {
        $field = CategoryModel::find($id);
        $cate = (new CategoryModel)->tree();
        return $this->fetch('category/edit',['field'=>$field,'cate'=>$cate]);
    }

    //保存更新的资源
    public function update(Request $request,$id)
    {
        if($request->isPut()){
            $data = input('put.');
            $validate = Validate('Category');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $res = CategoryModel::Where('cate_id',$id)->strict(false)->update($data);
            if($res){
                $this->redirect('/admin/cate');
            }
        }
        return $this->fetch('category/edit');
    }

    //删除指定资源
    public function delete($id)
    {
        $temp = CategoryModel::where('cate_id',$id)->find();
        CategoryModel::where('cate_pid',$id)->update(['cate_pid'=>$temp['cate_pid']]);
        $res = CategoryModel::where('cate_id',$id)->delete($id);

        if($res){
            $data = [
                'status' => 0,
                'msg' => '分类删除成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '分类删除失败',
            ];
        }
        return $data;
    }

    //显示指定的资源
    public function read($id){}
}
