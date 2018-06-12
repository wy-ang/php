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
        //使用FROM_UNIXTIME将create_time转换成年月日格式输出，FROM_UNIXTIME时MySql的方法
        //field方法属于模型的连贯操作方法之一，主要目的是标识要返回或者操作的字段，可以用于查询和写入操作。
        $article = Db::name('article')->where('authorId', $id)->field('FROM_UNIXTIME(create_time) as create_time,FROM_UNIXTIME(update_time) as update_time,author,authorId,title,content,id')->select();
        return ['code' => 1, 'data' => $article, 'msg' => '发表成功'];
    }
}