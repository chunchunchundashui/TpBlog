<?php
namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/10
 * Time: 19:03
 */

class Admin extends Model
{
    //软删除功能
    use SoftDelete;

    //只读字段
    protected $readonly = ['email'];
    //登陆效验
    public function login($data)

    {
        //通用验证
        $rule = [
        'username|管理员账户' => 'require',
        'password|密码'   => 'require',
          'verify|验证码'  => 'require|captcha',
    ];
        $validate = new \app\common\validate\Admin($rule);
        if (!$validate->scene('login')->check($data)) {
            return $validate->getError();
        }
      unset($data['verify']);
        $result = $this->where($data)->find();
        if ($result) {
            if ($result['status'] != 1) {
                return "此账户被禁用了!";
            }
            //1表示有这个用户,也就是用户名和密码正确了
            $sessionData = [
                'id' => $result['id'],
                'nickname' => $result['nickname'],
                'is_super' => $result['is_super'],
                'email' => $result['email']
            ];
            session('admin', $sessionData);
            return 1;
        }else{
            return "用户名或者密码错误!";
        }
    }

    //注册账户
    public function register($data)
    {
        $message = [
            'username|管理员账户' => 'require|unique:admin',
            'password|密码'   => 'require',
            'conpass|确认密码' => 'require|confirm:password',
            'nickname|昵称' => 'require',
            'email|邮箱' => 'require|email|unique:admin'
//        'code' => 'require'
        ];
        $validate = new \app\common\validate\Admin($message);
        if (!$validate->scene('register')->check($data)) {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result) {
// mailto($data['email'], '注册管理员账户成功!', '注册管理员账户成功');
            return 1;
        }else {
            return "注册失败!";
        }
    }

    //重置密码
    public function reset($data) {
        $reset = [
        'code' => 'require'
        ];
        $validate = new \app\common\validate\Admin($reset);
        if (!$validate->scene('reset')->check($data)) {
            return $validate->getError();
        }
        if ($data['code'] != session('code')) {
            return "验证码不正确";
        }
            $adminInfo = $this->where('email', $data['email'])->find();
            $password = mt_rand(10000,99999);
            $adminInfo->password = $password;
            $result = $adminInfo->save();
            if ($result) {
//                $content = '恭喜您,密码重置成功!<br>用户名:' . $adminInfo['username']. '<br>新密码:'. $password;
//                mail($data['email'], '密码重置成功', $content);
                $content = '恭喜您,密码重置成功!<br>用户名:' . $adminInfo['username']. '<br>新密码:'. $password;
                sendEmail(
                    [
                        ['user_email'=>$data['email'],'title'=>'密码重置成功','content'=>$content]
                    ]
                );
                return 1;
            }else {
                return "重置密码失败!";
            }
    }

    //添加管理员
    public function add($data)
    {
        $add = [
            'username|管理员账户' => 'require|unique:admin',
            'password|密码'   => 'require',
            'conpass|确认密码' => 'require|confirm:password',
            'nickname|昵称' => 'require',
            'email|邮箱' => 'require|email|unique:admin'
        ];
        $validate = new \app\common\validate\Admin($add);
        if (!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        }else {
            return "管理员添加失败!";
        }
    }

    //管理员编辑
    public function edit($data)
    {
        $rule = [
            'oldpass|原密码' => 'require',
            'newpass|新密码' => 'require',
            'nickname|会员昵称' => 'require',
        ];
        $validate = new \app\common\validate\Admin($rule);
        if (!$validate->scene('edit')->check($data)) {
            return $validate->getError();
        }
        $adminInfo = $this->find($data['id']);
        if ($data['oldpass'] != $adminInfo['password']) {
            return "原密码不正确!";
        }
        $adminInfo->password = $data['newpass'];
        $adminInfo->nickname = $data['nickname'];
        $result = $adminInfo->save();
        if ($result) {
            return 1;
        }else {
            return "管理员修改失败!";
        }
    }
}