<?php

namespace app\admin\controller;

use app\admin\model\LinksModel;
use think\Controller;
use think\Request;

class Links extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = LinksModel::order('link_order','asc')->select();
        return $this->fetch('links/list',['data'=>$data]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch('links/add');
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
            $validate = Validate('Links');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $res = LinksModel::create($data);
            if($res){
                $this->redirect('/admin/links');
            }
        }
        return $this->redirect('/admin/links/create');
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
        $field = LinksModel::find($id);
        return $this->fetch('links/edit',['field'=>$field]);
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
            $validate = Validate('Links');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $res = LinksModel::Where('link_id',$id)->strict(false)->update($data);
            if($res){
                $this->redirect('/admin/links');
            }
        }
        return $this->redirect('/admin/links/'.$id.'/edit');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $res = LinksModel::where('link_id',$id)->delete($id);
        if($res){
            $data = [
                'status' => 0,
                'msg' => '友情链接删除成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '友情链接删除失败',
            ];
        }
        return $data;
    }
}
