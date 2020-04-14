<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/25
 * Time: 10:06
 */

namespace app\common\validate;

use think\Validate;

class Member extends Validate
{
    //添加场景
    public function sceneAdd()
    {
        return $this->only(['username', 'password', 'nickname', 'email']);
    }
    
    //编辑场景
    public function sceneEdit()
    {
        return $this->only(['oldpass', 'newpass', 'nickname']);
    }

    //前台注册场景
    public function sceneRegister()
    {
        return $this->only(['username', 'password', 'conpass', 'nickname', 'email', 'verify']);
    }

    //登陆的验证场景
    public function sceneLogin()
    {
        return $this->only(['username', 'password', 'verify']);     //移除规则remove('字段名', 'unique');
    }
}