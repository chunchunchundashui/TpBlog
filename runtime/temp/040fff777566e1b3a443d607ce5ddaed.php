<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\phpStudy\WWW\tpblog\public/../application/index\view\article\add.html";i:1586778715;s:62:"D:\phpStudy\WWW\tpblog\application\index\view\public\base.html";i:1586747266;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
<?php echo (isset($catename) && ($catename !== '')?$catename:"长春个人博客"); ?>--<?php echo $webInfo['webname']; ?>
</title>
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
    

    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-body">
                        <!--method="post"  action="<?php echo url('admin/article/add'); ?>"   出错误就可以用同步请求来试试-->
                        <form action=""  class="form-horizontal">
                            <input type="hidden" name="member_id" value="<?php echo session('index.id'); ?>">
                            <div class="form-group">
                                <label for="title" class="control-label col-sm-2 no-padding-right">文章标题</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="文章标题" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="author" class="control-label col-sm-2 no-padding-right">文章作者</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="author" name="author" placeholder="文章作者" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags" class="control-label col-sm-2 no-padding-right">标签</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tags" name="tags" placeholder="标签" />
                                    <span class="help-block">标签以|来分隔</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox col-sm-offset-2 col-sm-6">
                                    <label>
                                        <input type="checkbox" name="is_top" value="1">
                                        <span class="text">是否推荐</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cateid" class="control-label col-sm-2">所属导航</label>
                                <div class="col-sm-6">
                                    <select id="cateid" name="cateid" class="form-control">
                                        <option value="">请选择</option>
                                        <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $vo['id']; ?>"><?php echo $vo['catename']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="control-label col-sm-2 no-padding-right">文章概要</label>
                                <div class="col-sm-6">
                                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" placeholder="文章标题"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="control-label col-sm-2">文章内容</label>
                                <div class="col-sm-6">
                                    <textarea name="content" id="content" cols="30" rows="10" class=""></textarea>
                                </div>
                            </div>
                            <?php if(session('?index.id')): ?>
                            <div class="form-group">
                                <label for="author" class="control-label col-sm-2 no-padding-right">验证码</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="verify" name="verify" placeholder="验证码" />
                                    <span class="input-group-addon" style="width: 150px;"><img  src="<?php echo url('index/verify'); ?>" id="vcode" alt="captcha" style="width: 150px;height: 45px; " onClick="this.src='<?php echo url('index/verify'); ?>?' + 'rand=' + Math.random()"></span>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <button type="submit" class="btn btn-primary" id="articleAdd">添加</button>
                                    <!--<input type="submit" value="提交">        进行同步请求-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>

</div>

<div class="footer">
    <p>Copyright 2019 <a href="#"><?php echo $webInfo['copyright']; ?></a> All Rights Reserved</p>
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

<script src="/tpblog/public/static/lib/ueditor/ueditor.config.js"></script>
<script src="/tpblog/public/static/lib/ueditor/ueditor.all.js"></script>
<script>
  //验证码刷新函数
  function refresh(){
    var vcode = document.getElementById('vcode');
    vcode.src = '<?php echo url('index/verify'); ?>?' + 'rand=' + Math.random();
  }

  $(function () {
    UE.getEditor('content');
  });
  $('#articleAdd').click(function () {
    if ("<?php echo session('?index.id'); ?>") {
      $.ajax({
        url: "<?php echo url('index/article/add'); ?>",
        type: "post",
        data: $('form').serialize(),
        dataType: "json",
        success:function (data) {
          if (data.code == 1) {
            layer.msg(data.msg, {
              icon:6,
              time:2000
            }, function () {
              location.href = data.url;
            });
          }else {
            var test = document.getElementById('verify');     //输入错误信息清空值
            test.value = '';
            layer.open({
              title:"文章发布失败",
              content:data.msg,
              icon:5,
              anim:6
            });
            refresh();
          }
        }
      });
    }else {
      layer.msg('请先登录', {
        icon:5,
        time:2000
      }, function () {
        location.href = "<?php echo url('index/index/login'); ?>";
      });
        }
    return false;
  });
</script>

</body>
</html>