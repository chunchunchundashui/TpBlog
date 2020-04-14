<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/30
 * Time: 11:44
 */

namespace app\common\validate;


use think\Validate;

class System  extends Validate
{
    protected $rule = [
        'webname|网站标题' => 'require',
        'copyright|版权信息' => 'require'
    ];
}