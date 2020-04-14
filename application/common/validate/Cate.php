<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/12
 * Time: 17:34
 */

namespace app\common\validate;



use think\Validate;

class Cate extends Validate
{
    //添加场景
    public function sceneAdd(){
        return $this->only(['catename', 'sort']);
    }

    //排序场景
    public function sceneSort()
    {
        return $this->only(['sort']);
    }

    //编辑场景
    public function sceneEdit()
    {
        return $this->only(['catename']);
    }
}