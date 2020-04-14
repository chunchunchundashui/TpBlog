<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/19
 * Time: 11:37
 */

namespace app\common\validate;


use think\Validate;

class Article extends Validate
{
    //添加场景
    public function sceneAdd()
    {
        return $this->only(['title', 'tags', 'cate_id', 'desc', 'content', 'author']);
    }

//    前台添加文章验证
  public function sceneAdd1()
  {
    return $this->only(['title', 'tags', 'cate_id', 'desc', 'content', 'author', 'verify']);
  }
    //推荐场景
    public function sceneTop()
    {
        return $this->only(['is_top']);
    }

    //文章修改场景
    public function sceneEdit()
    {
        return $this->only(['title', 'tags', 'is_top', 'cate_id', 'desc', 'content']);
    }
}