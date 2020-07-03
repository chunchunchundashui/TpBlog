<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpStudy\WWW\tpblog\public/../application/admin\view\index\login.html";i:1586755609;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>岳长春的个人博客</title>
    <link rel="shortcut icon" href="/logo.jpg" type="image/x-icon">
    <link href="/tpblog/public/static/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/tpblog/public/static/admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/tpblog/public/static/admin/css/weather-icons.min.css" rel="stylesheet" />
    <link id="beyond-link" href="/tpblog/public/static/admin/css/beyond.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="login-container">
    <div class="loginbox bg-white">
        <form>
            <div class="loginbox-title">登录</div>

            <div class="loginbox-or">
                <div class="or-line"></div>
            </div>
            <div class="loginbox-textbox">
                <input type="text" class="form-control" name="username" placeholder="用户名" />
            </div>
            <div class="loginbox-textbox">
                <input type="password" class="form-control" name="password" placeholder="密码" />
            </div>
            <div class="form-group">
                <label for="verify" class="control-label">验证码</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="verify" name="verify" placeholder="验证码" />
                    <!--<span class="input-group-addon"><img src="<?php echo captcha_src(); ?>" alt="验证码" onclick="this.src='<?php echo captcha_src(); ?>?id=5'"></span>-->
                    <span class="input-group-addon"><img src="<?php echo url('index/verify'); ?>" id="vcode" alt="captcha" style="width: 150px;height: 45px;" onClick="this.src='<?php echo url('index/verify'); ?>?' + 'rand=' + Math.random()"></span>
                </div>
            </div>
            <div class="loginbox-forgot">
                <a href="<?php echo url('admin/index/forget'); ?>">忘记密码?</a>
            </div>
            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" id="login" value="登陆">
            </div>
            <div class="loginbox-signup">
                <a href="<?php echo url('admin/index/register'); ?>">注册账户</a>
            </div>
        </form>
    </div>
    <div class="logobox">
        <p class="text-center" style="font-size: 18px;font-weight: bold;text-shadow: 3px 3px 3px #FF0000;font-style: italic;"></p>
    </div>
</div>

<script src="/tpblog/public/static/admin/js/skins.min.js"></script>
<!--Basic Scripts-->
<script src="/tpblog/public/static/admin/js/jquery.min.js"></script>
<script src="/tpblog/public/static/admin/js/bootstrap.min.js"></script>
<script src="/tpblog/public/static/admin/js/slimscroll/jquery.slimscroll.min.js"></script>
<!--Beyond Scripts-->
<script src="/tpblog/public/static/admin/js/beyond.js"></script>
<script src="/tpblog/public/static/lib/layer/layer.js"></script>
<script>
  //验证码刷新函数
  function refresh(){
    var vcode = document.getElementById('vcode');
    vcode.src = '<?php echo url('index/verify'); ?>?' + 'rand=' + Math.random();
  }

    $(window).bind("load", function () {

        /*Sets Themed Colors Based on Themes*/
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');

    });

    $(function () {
        $('#login').click(function () {
                $.ajax({
                    url:"<?php echo url('admin/index/login'); ?>",
                    type:'post',
                    // 表单序列化
                    data:$('form').serialize(),
                    dataType:'json',
                    success:function (data) {
                        if (data.code ==1) {
                            layer.msg(data.msg, {
                                icon:6,
                                time:1000
                            },function () {
                                location.href = data.url;
                            })
                        }else {
                          var test = document.getElementById('verify');     //输入错误信息清空值
                          test.value = '';
                            layer.open({
                                title:'登陆失败',
                                content:data.msg,
                                icon:5,
                                anim:6
                            });
                          refresh();
                        }
                    }
                });
            return false;
        })
    })
</script>
</body>
<!--  /Body -->
</html>
