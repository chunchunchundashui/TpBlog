<?php
namespace app\admin\controller;

/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/10
 * Time: 18:05
 */

use think\captcha\Captcha;
use think\Controller;

header("Content-type:text/html;charset=utf-8");
class Index extends Controller
{
    //重复登录过滤
    public function _initialize()
    {
        if (session('?admin.id')) {
            $this->redirect('admin/home/index');
        }
    }

    //后台登陆
    public function login()
    {
        if (request()->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'verify' => input('post.verify')
            ];
            $result = model('Admin')->login($data);
            if ($result == 1) {
                $this->success('登陆成功','admin/home/index');
            }else{
                 $this->error($result);
            }
        }
        return view();
    }

    //注册
    public function register()
    {
        if (request()->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'conpass' => input('post.conpass'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email')
            ];
            $result = model('Admin')->register($data);
            if ($result == 1) {
                sendEmail(
                    [
                        ['user_email'=>$data['email'],'content'=>'注册管理员账户成功']
                    ]
                );
                  $this->success('注册成功','admin/index/login');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //忘记密码,发送验证码
    public function forget()
    {
        if (request()->isAjax()) {
//            $addadmin = model('Admin')->where('email', input('post.email'))->find();
            $code = mt_rand(1000, 9999);
            session('code', $code);
//            $result = mailto(input('post.email'), '重置密码验证码', '您的重置密码验证码是'. $code);
            $result = sendEmail(
                [
                    ['user_email'=>input('post.email'),'title'=>'重置密码验证码','content'=>'您的重置密码验证码是:'. $code]
                ]
            );
            if ($result) {
                $this->success('验证码发送成功!');
            }else {
                $this->success('验证码发送失败!');
            }
//            $data = [
//                'email' => input('post.email')
//            ];
        }
        return view();
    }

    //重置密码
    public function reset()
    {
        $data = [
            'code' => input('post.code'),
            'email' => input('post.email')
        ];
        $result = model('Admin')->reset($data);
        if ($result == 1) {
            $this->success('重置密码成功,请去邮箱查看新密码!','admin/index/login');
        }else {
            $this->error($result);
        }
    }

  //生成验证码
  public function verify()
  {
    //如果gd库也开启了但是就是不能正常的生成验证码可以使用ob_clean()实现
    $config = array(
      'fontSize' => 20,              // 验证码字体大小(px)
      'useCurve' => false,            // 是否画混淆曲线
      'useNoise' => false,            // 是否添加杂点
      'imageH' => 50,               // 验证码图片高度
      'imageW' => 140,               // 验证码图片宽度
      'length' => 4,               // 验证码位数
      'codeSet'    =>  '0123456789',             // 验证码字体
      'reset ' => true
    );
    //实例化验证码类
    $captcha = new Captcha($config);
    return $captcha->entry();
  }
}