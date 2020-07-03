<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\phpStudy\WWW\tpblog\public/../application/index\view\article\info.html";i:1586750216;s:62:"D:\phpStudy\WWW\tpblog\application\index\view\public\base.html";i:1586747266;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
<?php echo $articleInfo['title']; ?>--<?php echo $webInfo['webname']; ?>
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
    
<div class="row">
    <div class="col-sm-12 col-md-8">
        <h1 class="article-title"><?php echo $articleInfo['title']; ?></h1>
        <div class="status"><?php echo $articleInfo['click']; ?>阅读-<?php echo $articleInfo['comm_num']; ?>评论-作者：<?php echo $articleInfo['author']; ?>
            <!--标签是以|存入数据库的.取出来没法用循环去公共文件定义一个变量-->
            <?php if(is_array(strToArray($articleInfo['tags'])) || strToArray($articleInfo['tags']) instanceof \think\Collection || strToArray($articleInfo['tags']) instanceof \think\Paginator): $i = 0; $__LIST__ = strToArray($articleInfo['tags']);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <span class="label label-default"><?php echo $vo; ?></span>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="article-content">
            <blockquote>
                <?php echo $articleInfo['desc']; ?>
            </blockquote>
            <?php echo $articleInfo['content']; ?>
        </div>
        <div class="article-comment">
            <div class="page-header"><b>相关评论</b></div>
            <div class="comment-content">
                <form action="#">
                    <input type="hidden" name="article_id" value="<?php echo $articleInfo['id']; ?>">
                    <input type="hidden" name="member_id" value="<?php echo session('index.id'); ?>">
                    <div class="form-group">
                        <textarea class="form-control" id="comment" name="content" rows="5" cols=""></textarea>
                    </div>
                    <div class="form-group pull-right">
                        <button type="submit" id="memberComm" class="btn btn-primary">评论（请认真评论）</button>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
            <div class="comment-list">
                <?php if(is_array($articleInfo['comments']) || $articleInfo['comments'] instanceof \think\Collection || $articleInfo['comments'] instanceof \think\Paginator): $i = 0; $__LIST__ = $articleInfo['comments'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="comment-list-item">
                    <div class="info"><?php echo $vo['member']['nickname']; ?><small><?php echo $vo['create_time']; ?></small></div>
                    <div class="content"><?php echo $vo['content']; ?></div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="affix">
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

<script>
    $(function () {
        $('#memberComm').click(function () {
            if ("<?php echo session('?index.id'); ?>") {        //如果说这个iD存在
                $.ajax({
                    url:"<?php echo url('index/article/comm'); ?>",
                    type:'post',
                    data:$('form').serialize(),
                    dataType:'json',
                    success:function (data) {
                        if (data.code == 1) {
                            layer.msg(data.msg, {
                                icon:6,
                                time:2000
                            }, function () {
                                location.href = location.url;
                            });
                        }else {
                            layer.open({
                                title:"评论失败!",
                                content:data.msg,
                                icon:5,
                                anim:6
                            });
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
    });
</script>

</body>
</html>