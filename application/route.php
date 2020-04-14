<?php
use think\Route;
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//前台路由
Route::rule('index/:id', 'index/index/index', 'get');       //可选id
Route::rule('/', 'index/index/index', 'get');  //前台首页路由
Route::rule('index/article-<id></id>', 'index/index/index', 'get');      //文章详情页路由
Route::rule('index/register', 'index/index/register', 'get|post');      //前台注册路由
Route::rule('index/login', 'index/index/login', 'get|post');        //前台登陆路由
Route::rule('index/loginout', 'index/index/loginout', 'post');      //登陆成功退出按钮路由
Route::rule('index/search/', 'index/index/search', 'get');      //前台搜索引擎路由
Route::rule('index/comment', 'index/article/comm', 'post');     //前台评论路由

//后台路由
Route::rule('admin/','admin/index/login','get|post');               //后台登陆页面路由
Route::rule('admin/register','admin/index/register','get|post');        //后台注册页面路由
Route::rule('admin/forget','admin/index/forget','get|post');            //后天忘记密码页面路由
Route::rule('admin/reset', 'admin/index/reset', 'post');                //后台重置密码页面路由
Route::rule('admin/index', 'admin/home/index', 'get');
Route::rule('admin/loginout', 'admin/home/loginout', 'post');
Route::rule('admin/catelists', 'admin/cate/lists', 'get');
Route::rule('admin/cateadd', 'admin/cate/add', 'get|post');
Route::rule('admin/catesort', 'admin/cate/sort', 'post');
Route::rule('admin/cateedit/[:id]', 'admin/cate/edit', 'get|post');  //可选参数[:id]    后台编辑路由
Route::rule('admin/cateedit', 'admin/cate/del', 'post');    //后台删除路由
Route::rule('admin/articlelists', 'admin/article/lists', 'get'); //后台文章列表路由
Route::rule('admin/articleadd', 'admin/article/add', 'get|post'); //后台文章添加路由
Route::rule('admin/articletop', 'admin/article/top', 'post');      //后天文章取消推荐或者推荐路由
Route::rule('admin/articleedit/[:id]', 'admin/article/edit', 'get|post'); //后台文章编辑路由
Route::rule('admin/articledel', 'admin/article/del', 'post');   //后台文章删除路由
Route::rule('admin/memberlists', 'admin/member/lists', 'get');   //后台会员列表路由
Route::rule('admin/memberadd', 'admin/member/add', 'get|post'); //后台会员添加路由
Route::rule('admin/memberedit/[:id]', 'admin/member/edit', 'get|post'); //后台会员编辑路由
Route::rule('admin/memberdel', 'admin/member/del', 'post');  //后台会员删除路由
Route::rule('admin/adminlists', 'admin/admin/lists', 'get'); //后台管理员列表路由
Route::rule('admin/adminadd', 'admin/admin/add', 'get|post'); //后台管理员添加路由
Route::rule('admin/adminstatus', 'admin/admin/status', 'post');  //后台管理员启动或者禁止路由
Route::rule('admin/adminedit/[:id]', 'admin/admin/edit', 'get|post'); // 可选参数[:id]   后台管理员编辑路由
Route::rule('admin/admindel', 'admin/admin/del', 'post');   //后台管理员删除路由
Route::rule('admin/comment', 'admin/comment/lists', 'get'); //后台评论列表路由
Route::rule('admin/commentdel', 'admin/admin/del', 'post');     //后台评论删除路由
Route::rule('admin/set', 'admin/system/set', 'get|post');   //后台系统设置

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];







