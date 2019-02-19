<?php

namespace app\admin\controller;

use app\admin\model\NavsModel;
use think\Controller;
use think\Request;

class Navs extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = NavsModel::order('nav_order','asc')->select();
        return $this->fetch('navs/list',['data'=>$data]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch('navs/add');
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
            $validate = Validate('Navs');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $res = NavsModel::create($data);
            if($res){
                $this->redirect('/admin/navs');
            }
        }
        return $this->redirect('/admin/navs/create');
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
        $field = NavsModel::find($id);
        return $this->fetch('navs/edit',['field'=>$field]);
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
            $validate = Validate('Navs');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $res = NavsModel::Where('nav_id',$id)->strict(false)->update($data);
            if($res){
                $this->redirect('/admin/navs');
            }
        }
        return $this->redirect('/admin/navs/'.$id.'/edit');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $res = NavsModel::where('nav_id',$id)->delete($id);
        if($res){
            $data = [
                'status' => 0,
                'msg' => '导航删除成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '导航删除失败',
            ];
        }
        return $data;
    }
}
