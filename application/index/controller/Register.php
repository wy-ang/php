<?php
/**
 * Created by PhpStorm.
 * RegisterModel: wyang
 * Date: 2018/4/16
 * Time: 11:39
 */

namespace app\index\controller;

use app\index\model\RegisterModel;
use think\Controller;
use think\facade\Env;

class Register extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    //注册
    public function addUser()
    {
        //获取全部数据
        $userinfo = $this->request->param();
        //引入model
        $user = new RegisterModel();
        //调用model的新增用户方法并传参
        $userInfo = $user->adduser($userinfo);
        //返回值
        return json($userInfo);
    }

    //上传
    public function upload()
    {
        $DS = DIRECTORY_SEPARATOR;
        $root_path = Env::get('root_path');
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->validate(['size' => 99999999, 'ext' => 'jpg,png,gif'])->rule('date')->move($root_path . $DS . 'public' . $DS . 'uploads');
        if ($info) {
            $fileName = $info->getSaveName();
            $src = $DS . 'uploads' . $DS . $fileName;
            return json(['code' => 1, 'src' => $src]);
        } else {
            return $this->error('上传失败：' . $file->getError());
        }
    }
}