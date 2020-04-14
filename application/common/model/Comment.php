<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/30
 * Time: 9:43
 */

namespace app\common\model;


use think\Model;
use traits\model\SoftDelete;

class Comment  extends Model
{
    //软删除
    use SoftDelete;

    //关联文章
    public function article()
    {
        return $this->belongsTo('Article', 'article_id', 'id');     //belongsTo多对一
    }

    //关联用户
    public function member()
    {
        return  $this->belongsTo('Member', 'member_id', 'id');  //belongsTo多对一
    }

    //文章评论
    public function comm($data)
    {
        $rule = [
          'content|评论内容' => 'require'
        ];
        $validate = new \app\common\validate\Comment($rule);
        if (!$validate->scene('comm')->check($data)) {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        }else {
            return "评论失败!";
        }
    }

}