<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //图片上传
    public function upload()
    {
        $file = Input::file('file');
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension(); //上文件的后缀
            $newName = date('Ymdhis').mt_rand(100,999).'.'.$entension;
            $path = $file->move(base_path().'/resources/assets/upload',$newName);
            $filepath = 'resources/assets/upload/'.$newName;
            return $filepath;
        }
    }
}
