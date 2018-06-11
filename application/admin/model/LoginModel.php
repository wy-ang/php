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

class LoginModel extends Model
{
    public function getInfo($phone, $password)
    {
        $dbUser = Db::name('user')->where('phone', $phone)->find();
        $dbPassWord = Db::name('user')->where('password', $password)->find();
        $username = $dbUser['username'];
        $id = $dbUser['id'];
        if ($dbUser == null) {
            return ['code' => -1, 'msg' => "用户名不存在"];
        }
        if ($dbPassWord == null) {
            return ['code' => -1, 'msg' => "密码错误"];
        }
        return ['code' => 1, 'username' => $username, 'id' => $id, 'msg' => "登录成功"];
    }
}