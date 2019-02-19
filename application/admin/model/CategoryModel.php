<?php
namespace app\admin\model;

use think\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $pk = 'cate_id';

    public function tree()
    {
        $categorys = $this->order('cate_order','asc')->select();
        return $this->sort($categorys);
    }

    public function sort($data,$pid=0,$level=0)
    {
        //无限极分类
        static $arr = array();
        foreach ($data as $k=>$v){
            if($v['cate_pid']==$pid){
                $v['level'] = $level;
                $arr[] = $v;
                $this->sort($data,$v['cate_id'],$level+1);
            }
        }
        return $arr;
    }



}