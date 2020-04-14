<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/30
 * Time: 9:43
 */

namespace app\admin\controller;


class Comment extends Base
{

    //评论列表
    public function lists()
    {
        $comment = model('Comment')->with('article,member')->order('create_time', 'desc')->paginate(10);
        $viewData = [
            'commets' => $comment
        ];
        $this->assign($viewData);
        return view();
    }

    //评论删除
    public function del()
    {
        $commentInfo = model('Comment')->find(input('post.id'));
        $result = $commentInfo->delete();
        if ($result) {
            $this->success('删除成功!','admin/comment/lists');
        }else {
            $this->error('删除失败!');
        }
    }
}