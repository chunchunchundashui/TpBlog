<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/19
 * Time: 11:36
 */

namespace app\admin\controller;


class Article extends Base
{
    //文章列表
    public function lists()
    {
        $articles = model('Article')->with('cate')->order(['is_top' => 'asc', 'create_time' => 'desc'])->paginate(10);
        $viewData = [
            'articles' => $articles
        ];
        $this->assign($viewData);
        return view();
    }

    //文章添加
    public function add()
    {

        //if (request()->isPost()) {
        if (request()->isAjax()) {
            $data = [
                'title' => input('post.title'),
                'author' => input('post.author'),
                'tags' => input('post.tags'),
                'is_top' => input('post.is_top', 0), //可以用三元运算 :    ?? 0
                'cate_id' => input('post.cateid'),
                'desc' => input('post.desc'),
                'content' => input('post.content')
            ];

            $result = model('Article')->add($data);
//            dump(model('Article')->getLastSql());           //getLastSql()打印sql语句
//            die;
            if ($result == 1) {
                $this->success("文章添加成功", 'admin/article/lists');
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
    
    //文章推荐
    public function top()
    {
        $data = [
            'id' => input('post.id'),
            'is_top' => input('post.is_top', '') ? 0 : 1                //三元运算符,有就为0,没有就为1
        ];
        $result = model('Article')->top($data);
        if ($result == 1) {
            $this->success('操作成功!', 'admin/article/lists');
        }else {
            $this->error($result);
        }
    }

    //文章编辑
    public function edit()
    {
        if (request()->isAjax()) {
            $data = [
                'id' => input('post.id'),
                'title' => input('post.title'),
                'tags' => input('post.tags'),
                'is_top' => input('post.is_top', 0),
                'cate_id' => input('post.cateid'),
                'desc' => input('post.desc'),
                'content' => input('post.content')
            ];

            $result = model('Article')->edit($data);
            if ($result == 1) {
                $this->success("文章修改成功!",'admin/article/lists');
            }else {
                $this->error($result);
            }
        }
        $articleInfo = model('Article')->find(input('id'));
        $cates  = model('Cate')->select();
        $viewData = [
            'articleInfo' => $articleInfo,
            'cates' => $cates
        ];
        $this->assign($viewData);
        return view();
    }
    
    //文章删除
    public function del()
    {
        $articleInfo = model('Article')->with('comments')->find(input('post.id'));
        $result = $articleInfo->together('comments')->delete();
        if ($result) {
            $this->success('文章删除成功!', 'admin/article/lists');
        }else {
            $this->error('文章删除失败!');
        }
    }
}