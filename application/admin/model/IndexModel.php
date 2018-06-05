<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2018/5/21
 * Time: 14:40
 */

namespace app\admin\model;

use think\Model;
use think\Db;
use think\facade\Session;

class IndexModel extends Model
{
    protected $name = 'user';

    public function userInfo($username)
    {
        $user = $this->where('username', $username)->find();
        if (!empty($user)) {
            return ['code' => 1, 'data'=>$user, 'msg' => '获取用户信息成功'];
        } else {
            return ['code' => -1, 'msg' => '获取用户信息失败'];
        }
    }

    public function articleInfo(){
        $id = Session::get('id');
        $article = Db::name('article')->where('authorId', $id)->find();
        return ['code' => 1, 'data' => $article, 'msg' => '发表成功'];
    }
}