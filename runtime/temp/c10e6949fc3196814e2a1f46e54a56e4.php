<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\phpStudy\WWW\tpblog\public/../application/admin\view\index\forget.html";i:1578120620;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>岳长春的个人博客</title>
    <link rel="shortcut icon" href="/static/admin/img/logo.jpg" type="image/x-icon">
    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/static/admin/css/weather-icons.min.css" rel="stylesheet" />
    <link id="beyond-link" href="/static/admin/css/beyond.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="login-container">
    <div class="loginbox bg-white">
        <form>
            <div class="loginbox-title">忘记密码?</div>

            <div class="loginbox-or">
                <div class="or-line"></div>
            </div>
            <div class="loginbox-textbox">
                <input type="email" class="form-control" name="email" placeholder="输入注册邮箱" />
            </div>
            <div class="loginbox-textbox hidden" >
                <input type="text" class="form-control" name="code" placeholder="验证码" />
            </div>
            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" id="sendCode" value="发送验证码">
            </div>
            <div class="loginbox-submit hidden">
                <input type="submit" class="btn btn-primary btn-block" id="reset" value="重置密码">
            </div>
            <div class="loginbox-signup">
                <a href="<?php echo url('admin/index/login'); ?>">返回登陆</a>
            </div>
        </form>
    </div>
    <div class="logobox">
        <p class="text-center" style="font-size: 18px;font-weight: bold;text-shadow: 3px 3px 3px #FF0000;font-style: italic;"></p>
    </div>
</div>

<script src="/static/admin/js/skins.min.js"></script>
<!--Basic Scripts-->
<script src="/static/admin/js/jquery.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
<script src="/static/admin/js/slimscroll/jquery.slimscroll.min.js"></script>
<!--Beyond Scripts-->
<script src="/static/admin/js/beyond.js"></script>
<script src="/static/lib/layer/layer.js"></script>
<script>
    $(window).bind("load", function () {

        /*Sets Themed Colors Based on Themes*/
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');

    });
    $(function () {
        $('#sendCode').click(function () {
            $.ajax({
                url:"<?php echo url('admin/index/forget'); ?>",
                type:"post",
                data:$('form').serialize(),
                dataType:'json',
                success:function (data) {
                    if (data.code == 1) {
                            $('[name=email]').parent().addClass('hidden');
                            $('[name=code]').parent().removeClass('hidden');
                            $('#sendCode').parent().addClass('hidden');
                            $('#reset').parent().removeClass('hidden');
                    }
                }
            });
            return false;
        });
        
        $('#reset').click(function () {
                $.ajax({
                    url:"<?php echo url('admin/index/reset'); ?>",
                    type:'post',
                    data:$('form').serialize(),
                    dataType:'json',
                    success:function (data) {
                        if (data.code == 1) {
                            layer.msg(data.msg, {
                                icon:6,
                                time:1000
                            }, function () {
                               location.href = data.url;
                            });
                        }else {
                            layer.open({
                                title:'密码重置失败',
                                content:data.msg,
                                icon:5,
                                anim:6
                            })
                        }
                    }
                });
            return false;
        })
    });
</script>
</body>
<!--  /Body -->
</html>
