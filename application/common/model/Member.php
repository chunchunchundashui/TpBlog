<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/25
 * Time: 10:06
 */

namespace app\common\model;


use think\Model;
use traits\model\SoftDelete;

class Member extends Model
{
    //软删除
    use SoftDelete;

    //只读字段
    protected $readonly = ['username', 'email'];    //$readonly设置不能修改的字段

    //关联评论
    public function comments()
    {
        return $this->hasMany('Comment', 'member_id','id');
    }
    //会员添加
    public function add($data)
    {
        $rule = [
            'username|用户名' => 'require|unique:member',
            'password|密码' => 'require',
            'nickname|昵称' => 'require|unique:member',
            'email|邮箱' => 'require|email|unique:member'
        ];
        $validate = new \app\common\validate\Member($rule);
        if (!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        }else {
            return '会员添加失败!';
        }
    }

    //会员编辑
    public function edit($data)
    {
        $rule = [
            'oldpass|原密码' => 'require',
            'newpass|新密码' => 'require',
            'nickname|会员昵称' => 'require|unique:member'
        ];
        $validate = new \app\common\validate\Member($rule);
        if (!$validate->scene('edit')->check($data)) {
            return $validate->getError();
        }
        $memberInfo = $this->find($data['id']);
        if ($data['oldpass'] != $memberInfo['password']) {
            return "原密码不正确!";
        }
        $memberInfo->password = $data['newpass'];
        $memberInfo->nickname = $data['nickname'];
        $result = $memberInfo->save();
        if ($result) {
            return 1;
        }else {
            return '会员修改失败!';
        }
    }

    //前台注册
    public function register($data)
    {
        $rule = [
            'username|用户名' => 'require|unique:member',
            'password|密码' => 'require',
            'conpass|确认密码' => 'require|confirm:password',
            'nickname|昵称' => 'require|unique:member',
            'email|邮箱' => 'require|email|unique:member',
            'verify|验证码' => 'require|captcha'       //captcha验证验证码是否正确
        ];
        $validate = new \app\common\validate\Member($rule);
        if (!$validate->scene('register')->check($data)) {
            return $validate->getError();
        }
//        添加一个状态
        $data['email_status'] = 0;
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        }else {
            return "注册失败!";
        }
    }

    //前台登陆
    public function login($data)
    {
        $rule = [
            'username|用户名' => 'require',
            'password|密码' => 'require',
            'verify|验证码' => 'require|captcha'       //captcha验证验证码是否正确
        ];
        $validate = new \app\common\validate\Member($rule);
        if (!$validate->scene('login')->check($data)) {
            return $validate->getError();
        }
        unset($data['verify']);
        $result = $this->where($data)->find();
        if ($result) {
            $sessionData = [
                'id' => $result['id'],
                'nickname' => $result['nickname']
            ];
            session('index', $sessionData);
            return 1;
        }else {
            return "用户名或者密码错误";
        }

    }
}