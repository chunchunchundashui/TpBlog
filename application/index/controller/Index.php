<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/10/6
 * Time: 19:35
 */

namespace app\index\controller;

use function GuzzleHttp\Psr7\str;
use Symfony\Component\Routing\Tests\Matcher\DumpedUrlMatcherTest;
use think\captcha\Captcha;

class Index extends Base
{
    //首页
    public function index()
    {
        $where = [];
        $catename = null;
        if (input('?id')) {         //判断有没有这个ID
            $where = [
                'cate_id' => input('id')
            ];
            $catename = model('Cate')->where('id', input('id'))->value('catename');
        }
        $articles = model('Article')->where($where)->order('create_time', 'desc')->paginate(5, false, ['query' => $where]);
        $viewData = [
            'articles' => $articles,
            'catename' => $catename
        ];
        $this->assign($viewData);
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
                'email' => input('post.email'),
                'verify' => input('post.verify')
            ];
//          $create_time = time();
////          base64加密
//          $base = base64_encode(($data['email'].'|'.$create_time));
////          base64解密
//          $base1 = 'http://www.yccpanda.com/'.utf8_decode(($data['email'].'|'.$create_time));
//          $str = strToArray($base1);
//          $html = file_get_contents($base1);
//          dump($html);
//          dump($str);
//          dump($base);
////          获取服务器地址
//          dump($_SERVER['HTTP_HOST']);
//          dump($_SERVER['HTTP_REFERER']);
//          dump($base1);die;
          $result = model('Member')->register($data);
//          $ctime = strtotime('+10minute');
          if ($result == 1) {
//                mel($data['email'], 'http://www.yccpanda.com/'.base64_encode(($data['email'].'|'.$create_time)));
                mel($data['email'], 'http://www.yccpanda.com/index/login.html');
//                if ($create_time > $ctime) {
//
//                }
                $this->success('注册成功', 'index/index/login');
            }else {
                $this->error($result);
            }
        }
        return view();
    }

    //登陆
    public function login()
    {
        if (request()->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'verify' => input('post.verify')
            ];
            $result = model("Member")->login($data);
            if ($result == 1) {
                $this->success('登陆成功', 'index/index/index');
            }else {
                $this->error($result);
            }
        }
        return view();
    }
    
    //退出失败
    public function loginout()
    {
        session(null);
        if (session('?index.id')) {
            $this->error('退出失败!');
        }else {}
        $this->success('退出成功','index/index/index');
    }

    //前台搜索
    public function search()
    {
//        $where[] = ['title', 'like', '%' . input('keyword') . '%'];
        $catename = input('keyword');
        $articles = model('Article')->where('title', 'like', '%' . input('keyword') . '%')->order('create_time', 'desc')->paginate(10);
        $viewData = [
            'articles' => $articles,
            'catename' => $catename
        ];
        $this->assign($viewData);
        return view('index');
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