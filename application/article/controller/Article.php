<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2018/6/5
 * Time: 15:06
 */

namespace app\article\controller;

use app\article\model\ArticleModel;
use think\Controller;

class Article extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function release()
    {
        if ($this->request->isAjax()) {
            $content = $this->request->param();
            $aticle = new ArticleModel();
            $data = $aticle->releaseAticle($content);
            return $data;
        }
        return $this->fetch('release/index');
    }
}
