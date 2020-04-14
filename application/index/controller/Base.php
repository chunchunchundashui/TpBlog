<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/10/6
 * Time: 20:12
 */

namespace app\index\controller;


use think\Controller;

class Base extends Controller
{
    //使用共享视图
    public function _initialize()
    {
        $cates = model('Cate')->order('sort', 'asc')->select();
        $webInfo = model('System')->find();
        $topArticles = model('Article')->where('is_top', 1)->order('create_time', 'desc')->limit(10)->select();
        $viewData = [
            'cates' => $cates,          //导航查询
            'webInfo' =>$webInfo,        //版权查询
            'topArticles' => $topArticles       //推荐文章查询
        ];
        $this->view->share($viewData);     //共享视图,view里面的share方法
    }
}