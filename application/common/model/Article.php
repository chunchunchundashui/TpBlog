<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/19
 * Time: 11:36
 */

namespace app\common\model;


use think\Model;
use traits\model\SoftDelete;

class Article extends Model
{
    //软删除
    use SoftDelete;

    //关联栏目表
    public function cate()
    {
        return $this->belongsTo('Cate', 'cate_id', 'id');
    }
    
    //关联评论
    public function comments()
    {
        return $this->hasMany('Comment', 'article_id', 'id');
    }

    //添加文章
    public function add($data)
    {
        $add = [
            'title|文章标题' => 'require|unique:article',
            'author|文章作者' => 'require',
            'tags|标签' => 'require',
            'cate_id|所属栏目' => 'require',
            'desc|文章概要' => 'require',
            'content|内容' => 'require',
        ];
        $validate = new \app\common\validate\Article($add);

        if (!$validate->scene('add')->check($data)) {
             return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        }else {
            return '文章添加失败!';
        }
    }

//    前台添加文章
  public function add1($data)
  {
    $add = [
      'title|文章标题' => 'require|unique:article',
      'author|文章作者' => 'require',
      'tags|标签' => 'require',
      'cate_id|所属栏目' => 'require',
      'desc|文章概要' => 'require',
      'content|内容' => 'require',
      'verify|验证码'  => 'require|captcha',
    ];
    $validate = new \app\common\validate\Article($add);
    if (!$validate->scene('add1')->check($data)) {
      return $validate->getError();
    }
    $result = $this->allowField(true)->save($data);
    if ($result) {
      return 1;
    }else {
      return '文章添加失败!';
    }
  }
    
    //推荐
    public function top($data)
    {
        $rule = [
            'is_top|推荐' => 'require'
        ];
        $validate = new \app\common\validate\Article($rule);
        if (!$validate->scene('top')->check($data)) {
            return $this->getError();
        }
        $articleInfo = $this->find($data['id']);
        $articleInfo->is_top = $data['is_top'];
        $result = $articleInfo->save();
        if ($result) {
            return 1;
        }else {
            return "操作失败!";
        }
    }

    //文章修改
    public function edit($data)
    {

        $add = [
            'title|文章标题' => 'require|unique:article',
            'tags|标签' => 'require',
            'is_top|推荐' => 'require',
            'cate_id|所属栏目' => 'require',
            'desc|文章概要' => 'require',
            'content|内容' => 'require'
        ];

        $validate = new \app\common\validate\Article($add);

        if (!$validate->scene('edit')->check($data)) {

            return $validate->getError();
        }
        $articleInfo = $this->find($data['id']);
        $articleInfo->title = $data['title'];
        $articleInfo->tags = $data['tags'];
        $articleInfo->is_top = $data['is_top'];
        $articleInfo->cate_id = $data['cate_id'];
        $articleInfo->desc = $data['desc'];
        $articleInfo->content = $data['content'];
        $result = $articleInfo->save();

        if ($result) {
            return 1;
        }else {
            return "文章修改失败!";
        }
    }

    //
}