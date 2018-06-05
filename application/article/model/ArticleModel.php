<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2018/6/5
 * Time: 15:07
 */

namespace app\article\model;

use think\Model;

class ArticleModel extends Model
{
    protected $name = 'article';
    protected $autoWriteTimestamp = true;

    public function releaseAticle($content)
    {
        $data = $this->allowField(true)->save($content);
        if ($data == 1) {
            return ['code' => 1, 'msg' => '发表成功'];
        } else {
            return ['code' => -1, 'msg' => '发表失败'];
        }
    }
}