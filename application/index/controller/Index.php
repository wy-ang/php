<?php

namespace app\index\controller;

use app\index\model\IndexModel;
use think\Controller;
use think\facade\Session;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    //获取当前登录用户名
    public function getUserName()
    {
        $username = Session::get('username');
        $index = new IndexModel();
        $info = $index->userInfo($username);
        return json($info);
    }

    //退出登录
    public function logout()
    {
        Session::delete('username');
        Session::delete('id');
        if (Session::has('admin') or Session::has('id')) {
            return $this->error('退出失败');
        } else {
            return $this->success('退出成功');
        }
    }
}
