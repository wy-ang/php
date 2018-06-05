<?php
/**
 * Created by PhpStorm.
 * RegisterModel: wyang
 * Date: 2018/4/16
 * Time: 11:39
 */
namespace app\admin\model;

use think\Model;
use think\Db;

class LoginModel extends Model {
    public function getInfo($phone,$password){
        $userInfo = Db::name('user')->where(['phone'=>$phone,'password'=>$password])->find();
        $username = $userInfo['username'];
        $id = $userInfo['id'];
        if (empty($userInfo)){
            return '登录失败';
        }else{
            return ['username'=>$username,'id'=>$id,'msg'=>"登录成功"];
        }
    }
}