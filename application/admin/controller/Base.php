<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/12
 * Time: 9:18
 */

namespace app\admin\controller;



use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        if (!session('?admin.id')) {
            $this->redirect('admin/index/login');
        }
    }
}