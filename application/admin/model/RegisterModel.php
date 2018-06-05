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
use think\facade\Session;

class RegisterModel extends Model
{
    protected $name = 'user';

    public function adduser($userinfo)
    {
        $id = $userinfo['id'];
        //注册
        if (empty($id)) {
            $user = $this->where('username', $userinfo['username'])->where('phone', $userinfo['phone'])->find();
            if (!empty($user)) {
                return ['code' => -1, 'msg' => '用户名或手机号已存在'];
            }
            $data = $this->allowField(true)->save($userinfo);
            if ($data == 1) {
                $id = $this->getLastInsID();
                //存储session
                Session::set('username', $userinfo['username']);
                Session::set('id', $id);
                return ['code' => 1, 'msg' => '注册成功'];
            } else {
                return ['code' => -1, 'msg' => '注册失败'];
            }
        } else {
            //修改信息
            $this->save($userinfo, ['id' => $userinfo['id']]);
            return ['code' => 1, 'msg' => '修改成功'];
        }
    }
}