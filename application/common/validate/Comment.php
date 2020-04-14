<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/30
 * Time: 9:44
 */

namespace app\common\validate;


use think\Validate;

class Comment extends Validate
{
    //评论验证器
    public function sceneComm()
    {
        return $this->only(['content']);
    }
}