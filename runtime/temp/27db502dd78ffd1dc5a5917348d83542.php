<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"D:\phpStudy\WWW\tpblog\public/../application/index\view\index\register.html";i:1586752676;s:62:"D:\phpStudy\WWW\tpblog\application\index\view\public\base.html";i:1586747266;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>长春个人博客</title>
    <link rel="stylesheet" href="/tpblog/public/static/index/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/tpblog/public/static/index/css/animate.css" />
    <link rel="stylesheet" href="/tpblog/public/static/index/css/index.css" />
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo url('index/index/index'); ?>" class="navbar-brand">长春</a>
        </div>
        <div class="navbar-menu collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?php echo url('index/index/index'); ?>">首页</a></li>
                <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo url('index/index/index', ['id' => $vo['id']]); ?>"><?php echo $vo['catename']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(session('?index.id')): ?>
                <li><a href="javascript:;"><?php echo session('index.nickname'); ?></a></li>
                <li><a href="javascript:;" id="loginout">退出</a></li>
                <?php else: ?>
                <li><a href="<?php echo url('index/index/login'); ?>">登录</a></li>
                <li><a href="<?php echo url('index/index/register'); ?>">注册</a></li>
                <?php endif; ?>
                <li><a href="<?php echo url('index/article/add'); ?>">投稿</a></li>
            </ul>
            <form action="<?php echo url('index/index/search'); ?>" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control input-sm" id="search" name="keyword" placeholder="搜索" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-sm">搜索</button>
                </div>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    
<div class="content center-block animated fadeInDown">
    <div class="page-header h1">用户注册</div>
    <form action="#">
        <div class="form-group">
            <label for="username" class="control-label">用户名</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="填写用户名" />
        </div>
        <div class="form-group">
            <label for="password" class="control-label">密码</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="填写密码" />
        </div>
        <div class="form-group">
            <label for="conpass" class="control-label">确认密码</label>
            <input type="password" class="form-control" id="conpass" name="conpass" placeholder="确认密码" />
        </div>
        <div class="form-group">
            <label for="nickname" class="control-label">昵称</label>
            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="填写昵称" />
        </div>
        <div class="form-group">
            <label for="email" class="control-label">邮箱</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="确认邮箱" />
        </div>
        <div class="form-group">
            <label for="verify" class="control-label">验证码</label>
            <div class="input-group">
                <input type="text" class="form-control" id="verify" name="verify" placeholder="验证码" />
                <span class="input-group-addon"><img src="<?php echo url('index/verify'); ?>" id="vcode" alt="captcha" style="width: 150px;height: 45px;" onClick="this.src='<?php echo url('index/verify'); ?>?' + 'rand=' + Math.random()"></span>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" id="register">注册</button>
        </div>
    </form>
</div>
<div class="bottom center-block animated fadeInUp">
    Copyright 2019 <?php echo $webInfo['copyright']; ?> All Rights Reserved
</div>

</div>



<script src="/tpblog/public/static/index/js/jquery-3.3.1.min.js"></script>
<script src="/tpblog/public/static/index/js/bootstrap.min.js"></script>
<script src="/tpblog/public/static/lib/layer/layer.js"></script>
<script>
    $(function () {
       $('#loginout').click(function () {
            $.ajax({
                url:"<?php echo url('index/index/loginout'); ?>",
                type:'post',
                dataType:'json',
                success:function (data) {
                    if (data.code == 1) {
                        layer.msg(data.msg, {
                            icon:6,
                            time:2000
                        }, function () {
                            location.href = data.url;
                        });
                    } else {
                        layer.open({
                            time:"退出失败",
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                    }
                }
            });
           return false;
       });
    });
</script>

<script>
  //验证码刷新函数
  function refresh(){
    var vcode = document.getElementById('vcode');
    vcode.src = '<?php echo url('index/verify'); ?>?' + 'rand=' + Math.random();
  }

    $(function () {
        $('#register').click(function () {
            $.ajax({
                url:"<?php echo url('index/index/register'); ?>",
                type:'post',
                data:$('form').serialize(),
                dataType:'json',
                success:function (data) {
                    if (data.code == 1) {
                        layer.msg(data.msg, {
                           icon:6,
                           time:2000
                        }, function () {
                            location.href = data.url;
                        });
                    } else {
                      var test = document.getElementById('verify');     //输入错误信息清空值
                      test.value = '';
                        layer.open({
                            title:"注册失败!",
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                      refresh();
                    }
                }
            });
            return false;
        });
    });
</script>

</body>
</html>