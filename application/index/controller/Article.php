<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/10/8
 * Time: 9:17
 */

namespace app\index\controller;


class Article extends Base
{
    //文章详情页
    public function info()
    {
        $articleInfo = model('Article')->with('comments,comments.member')->find(input('id'));
        $articleInfo->setInc('click');      //setInc为自增值,setDec为自减值
        $viewData = [
            'articleInfo' => $articleInfo
        ];
        $this->assign($viewData);
        return view();
    }

    //文章评论
    public function comm()
    {
        $data = [
            'article_id' => input('post.article_id'),
            'member_id' => input('post.member_id'),
            'content' => input('post.content')
        ];
        $result = model('Comment')->comm($data);
        if ($result == 1) {
            $this->success('评论成功!');
        }else {
            $this->error($result);
        }
    }

//    文章添加
  public function add()
  {
    if (request() -> isPost()) {
      $data = [
        'title' => input('post.title'),
        'author' => input('post.author'),
        'tags' => input('post.tags'),
        'is_top' => input('post.is_top', 0), //可以用三元运算 :    ?? 0
        'cate_id' => input('post.cateid'),
        'desc' => input('post.desc'),
        'content' => input('post.content'),
        'verify' => input('post.verify')
      ];
      $result = model('article')->add1($data);
      if ($result == 1) {
        $this->success("文章发布成功", 'index/index/index');
      }else {
        $this->error($result);
      }
    }
    $cates = model('Cate')->select();
    $viewData = [
      'cates' => $cates
    ];
    $this->assign($viewData);
    return view();
}
}