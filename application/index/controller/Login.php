<?php
/**
 * Created by PhpStorm.
 * RegisterModel: wyang
 * Date: 2018/4/16
 * Time: 11:39
 */
namespace app\index\controller;

use app\index\model\LoginModel;
use think\Controller;
use think\facade\Session;

class Login extends Controller {
    public function index(){
        return $this->fetch();
    }
    //登录
    public function login(){
        $phone= input('phone');
        $password= input('password');
        $loginInfo = new LoginModel();
        $data = $loginInfo->getInfo($phone,$password);
        $username = $data['username'];
        $id = $data['id'];
        //存储session
        Session::set('username',$username);
        Session::set('id',$id);
        return json(['code' => 1,'msg' => $data['msg']]);
    }
}