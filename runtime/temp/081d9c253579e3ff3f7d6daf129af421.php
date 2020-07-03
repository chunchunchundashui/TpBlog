<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\phpStudy\WWW\tpblog\public/../application/index\view\index\index.html";i:1578120850;s:62:"D:\phpStudy\WWW\tpblog\application\index\view\public\base.html";i:1586747266;}*/ ?>
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
    
<div class="jumbotron">
    <h1 class="animated fadeInDown">长春！</h1>
    <p class="animated shake">长春是一个教学级博客系统，目前使用ThinkPHP5.1和Laravel5.5框架各开发一个，网站暂时只提供博文浏览功能，视频功能、留言功能、投稿功能、收益功能、推荐功能稍后开放。</p>
</div>
<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="page-header h3"><?php echo (isset($catename) && ($catename !== '')?$catename:"文章"); ?>列表</div>
        <div class="article-list">
            <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="article-list-item">
                <a href="<?php echo url('index/article/info', ['id' => $vo['id']]); ?>" class="title"><?php echo $vo['title']; ?></a>
                <div class="info">
                    <span class="author">作者：<?php echo $vo['author']; ?></span>-
                    <span class="time">发布时间：<?php echo $vo['create_time']; ?></span>-
                    <span class="read">阅读：<?php echo $vo['click']; ?></span>-
                    <span class="comment">评论：<?php echo $vo['comm_num']; ?></span>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <nav class="">
            <?php echo $articles->render(); ?>
        </nav>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="page-header h3">推荐文章</div>
        <div class="topic-list">
            <?php if(is_array($topArticles) || $topArticles instanceof \think\Collection || $topArticles instanceof \think\Paginator): $i = 0; $__LIST__ = $topArticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="topic-list-item">
                <a href="<?php echo url('index/article/info', ['id' => $vo['id']]); ?>" class="title"><?php echo $vo['title']; ?></a>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
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


</body>
</html>