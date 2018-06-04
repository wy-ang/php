<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2018/5/21
 * Time: 14:40
 */

namespace app\index\model;

use think\Model;
use think\Db;

class IndexModel extends Model
{
    protected $name = 'user';

    public function userInfo($username)
    {
        $user = $this->where('username', $username)->find();
        if (!empty($user)) {
            return ['code' => 1, 'data'=>['username' => $user['username'], 'filePath' => $user['filePath']], 'msg' => '获取用户信息成功'];
        } else {
            return ['code' => -1, 'msg' => '获取用户信息失败'];
        }
    }
}