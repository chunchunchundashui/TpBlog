<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"D:\phpStudy\WWW\tpblog\public/../application/admin\view\article\lists.html";i:1569296525;s:63:"D:\phpStudy\WWW\tpblog\application\admin\view\public\_head.html";i:1586754097;s:63:"D:\phpStudy\WWW\tpblog\application\admin\view\public\_left.html";i:1569978849;s:61:"D:\phpStudy\WWW\tpblog\application\admin\view\public\_js.html";i:1586754165;}*/ ?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>岳长春的个人博客</title>
    <link href="/tpblog/public/static/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/tpblog/public/static/admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/tpblog/public/static/admin/css/weather-icons.min.css" rel="stylesheet" />
    <link id="beyond-link" href="/tpblog/public/static/admin/css/beyond.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Loading Container -->
<div class="loading-container">
    <div class="loader"></div>
</div>
<!--  /Loading Container -->
<!-- Navbar -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="<?php echo url('admin/home/index'); ?>" class="navbar-brand">
                    <small style="line-height: 40px;">春春程序员管理后台</small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings --->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/tpblog/public/static/admin/img/logo.jpg">
                                </div>
                                <section style="min-width: 85px;">
                                    <h2><span class="profile"><span><?php echo session('admin.nickname'); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>长春</a></li>
                                <li class="email"><a><?php echo session('admin.email'); ?></a></li>
                                <!--Avatar Area-->
                                <li>
                                    <div class="avatar-area">
                                        <img src="/tpblog/public/static/admin/img/logo.jpg" class="avatar">
                                        <span class="caption">个人头像</span>
                                    </div>
                                </li>
                                <!--Avatar Area-->
                                <li class="edit">
                                    <a href="profile.html" class="pull-left">个人资料</a>
                                    <a href="#" class="pull-right">个人设置</a>
                                </li>
                                <!--Theme Selector Area-->
                                <li class="theme-area">
                                    <ul class="colorpicker" id="skin-changer">
                                        <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="/tpblog/public/static/admin/css/skins/blue.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="/tpblog/public/static/admin/css/skins/azure.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="/tpblog/public/static/admin/css/skins/teal.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="/tpblog/public/static/admin/css/skins/green.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="/tpblog/public/static/admin/css/skins/orange.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="/tpblog/public/static/admin/css/skins/pink.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="/tpblog/public/static/admin/css/skins/darkred.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="/tpblog/public/static/admin/css/skins/purple.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="/tpblog/public/static/admin/css/skins/darkblue.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="/tpblog/public/static/admin/css/skins/gray.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="/tpblog/public/static/admin/css/skins/black.min.css"></a></li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="/tpblog/public/static/admin/css/skins/deepblue.min.css"></a></li>
                                    </ul>
                                </li>
                                <!--/Theme Selector Area-->
                                <li class="dropdown-footer">
                                    <a href="#" id="loginout">退出</a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                        no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                    <div class="setting">
                        <a id="btn-setting" title="Setting" href="#">
                            <i class="icon glyphicon glyphicon-cog"></i>
                        </a>
                    </div>
                    <div class="setting-container">
                        <label>
                            <input type="checkbox" id="checkbox_fixednavbar">
                            <span class="text">头部固定</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedsidebar">
                            <span class="text">菜单固定</span>
                        </label>
                    </div>
                    <!-- Settings -->
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>
<!-- /Navbar -->
<!-- Main Container -->
<div class="main-container container-fluid">
    <!-- Page Container -->
    <div class="page-container">

        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
    <ul class="nav sidebar-menu">
        <li class="active">
            <a href="index.html">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text">后台首页</span>
            </a>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon glyphicon-th"></i>
                <span class="menu-text">栏目管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/cate/lists'); ?>">
                        <span class="menu-text">栏目列表</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/cate/add'); ?>">
                        <span class="menu-text">栏目添加</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon glyphicon-book"></i>
                <span class="menu-text">文章管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/article/lists'); ?>">
                        <span class="menu-text">文章列表</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/article/add'); ?>">
                        <span class="menu-text">文章添加</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
        <a href="<?php echo url('admin/comment/lists'); ?>" class="menu-dropdown">
            <i class="menu-icon glyphicon glyphicon glyphicon-comment"></i>
            <span class="menu-text">评论列表</span>
            <i class="menu-expand"></i>
        </a>
    </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon glyphicon-user"></i>
                <span class="menu-text">会员管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/member/lists'); ?>">
                        <span class="menu-text">会员列表</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/member/add'); ?>">
                        <span class="menu-text">会员添加</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon glyphicon-send"></i>
                <span class="menu-text">管理员管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/admin/lists'); ?>">
                        <span class="menu-text">管理员列表</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/admin/add'); ?>">
                        <span class="menu-text">管理员添加</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo url('admin/system/set'); ?>">
                <i class="menu-icon glyphicon glyphicon-cog"></i>
                <span class="menu-text">系统设置</span>
            </a>
        </li>
    </ul>
</div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>&nbsp;文章管理
                    </li>
                    <li>文章列表</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Body -->
            <div class="page-body">
                <a href="<?php echo url('admin/article/add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>&nbsp;添加文章</a>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget">
                            <div class="widget-header">
                                <span class="widget-caption">文章列表</span>
                                <div class="widget-buttons">
                                        <?php echo replace($articles->render()); ?>
                                </div>
                            </div>
                            <div class="widget-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>文章标题</th>
                                        <th>所属导航</th>
                                        <th>推荐</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <tr>
                                        <td><?php echo $vo['id']; ?></td>
                                        <td><?php echo $vo['title']; ?></td>
                                        <td><?php echo $vo['cate']['catename']; ?></td>
                                        <td><?php if($vo['is_top'] == 1): ?>已推荐<?php else: ?>未推荐<?php endif; ?></td>
                                        <td>
                                            <?php if($vo['is_top'] == 1): ?>
                                            <a href="#" class="btn btn-sm btn-darkorange article-top" istop="<?php echo $vo['is_top']; ?>" dataid="<?php echo $vo['id']; ?>">取消推荐</a>
                                            <?php else: ?>
                                            <a href="#" class="btn btn-sm btn-azure article-top" istop="<?php echo $vo['is_top']; ?>" dataid="<?php echo $vo['id']; ?>">推荐</a>
                                            <?php endif; ?>
                                            <a href="<?php echo url('admin/article/edit', ['id' => $vo['id']]); ?>" class="btn btn-sm btn-warning">编辑</a>
                                            <a href="#" class="btn btn-sm btn-danger article-del" dataid="<?php echo $vo['id']; ?>">删除</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Container -->
    <!-- Main Container -->

</div>

<script src="/tpblog/public/static/admin/js/skins.min.js"></script>
<!--Basic Scripts-->
<script src="/tpblog/public/static/admin/js/jquery-3.4.1.min.js"></script>
<script src="/tpblog/public/static/admin/js/bootstrap.min.js"></script>
<script src="/tpblog/public/static/admin/js/slimscroll/jquery.slimscroll.min.js"></script>
<!--Beyond Scripts-->
<script src="/tpblog/public/static/admin/js/beyond.js"></script>
<script src="/tpblog/public/static/lib/layer/layer.js"></script>
<script>
    $(window).bind("load", function () {

        /*Sets Themed Colors Based on Themes*/
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');

    });

    // 退出
    $(function () {
        $('#loginout').click(function () {
                $.ajax({
                    url:"<?php echo url('admin/home/loginout'); ?>",
                    type:'post',
                    dataType:'json',
                    success:function (data) {
                        if (data.code = 1) {
                            layer.msg(data.msg,{
                                icon:6,
                                time:2000
                            }, function () {
                                location.href = data.url;
                            });
                        }else {
                            layer.open({
                                title:'退出失败',
                                content:data.msg,
                                icon:5,
                                anim:6
                            });
                        }
                    }
                });
            return false;
        });
    })
</script>
<script>
    $(function () {
        $('.article-top').click(function () {
            var id = $(this).attr('dataid');
            var is_top = $(this).attr('istop');
            if (is_top == 1) {
                var msg = '确定取消推荐吗?';
            }else {
                var msg = '确定推荐吗?';
            }
            layer.confirm(msg, {
                title:"推荐操作",
                icon:3
            }, function (index) {
                layer.close(index);
                $.ajax({
                    url:"<?php echo url('admin/article/top'); ?>",
                    type:'post',
                    data:{id:id, is_top:is_top},
                    dataType:'json',
                    success:function (data) {
                        if (data.code == 1) {
                            layer.msg(data.msg, {
                                icon:6,
                                time:2000
                            }, function () {
                                location.href = data.url;
                            });
                        }else {
                            layer.open({
                                title:'操作失败',
                                content:data.msg,
                                icon:5,
                                anim:6
                            });
                        }
                    }
                });
            });
            return false;
        });

        $('.article-del').click(function () {
            var id = $(this).attr('dataid');
            layer.confirm('确定删除吗?', {
                title:'删除文章',
                icon:3
            }, function (index) {
                layer.close(index);
                $.ajax({
                    url:"<?php echo url('admin/article/del'); ?>",
                    type:'post',
                    data:{id:id},
                    dataType:'json',
                    success:function (data) {
                        if (data.code == 1) {
                            layer.msg(data.msg, {
                                icon:6,
                                time:2000
                            }, function () {
                                location.href = data.url;
                            });
                        }else {
                            layer.open({
                                title:'删除文章失败',
                                content:data.msg,
                                icon:5,
                                anim:6
                            });
                        }
                    }
                });
            });
            return false;
        });
    });
</script>
</body>
<!--  /Body -->
</html>
