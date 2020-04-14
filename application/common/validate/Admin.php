<?php
namespace app\common\validate;

use think\Validate;

/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/10
 * Time: 19:10
 */

class Admin extends Validate
{
    //通用验证
//    protected $rule = [
//        'username|管理员账户' => 'require',
//        'password|密码'   => 'require',
//        'conpass|确认密码' => 'require|confirm:password',
//        'nickname|昵称' => 'require',
//        'email|邮箱' => 'require|email|unique:admin',
//        'code' => 'require'
//    ];

    //登陆验证场景
    public function sceneLogin()
    {
        return $this->only(['username', 'password', 'verify']);
    }

    //注册场景验证
    public function sceneRegister()
    {
        return $this->only(['username', 'password', 'conpass', 'nickname', 'email'])
            ->append('username','unique:admin');
    }

    //重置密码验证场景
    public function sceneReset()
    {
        return $this->only(['code']);
    }

    //管理员添加验证场景
    public function sceneAdd(){
        return $this->only(['username', 'password', 'conpass', 'nickname', 'email'])->append('username','unique:admin');
    }

    //管理员编辑验证场景
    public function sceneEdit()
    {
        return $this->only(['oldpass', 'newpass', 'nickname']);
    }
}