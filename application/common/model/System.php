<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/30
 * Time: 11:43
 */

namespace app\common\model;


use think\Model;
use traits\model\SoftDelete;

class System extends Model
{
    //软删除
    use SoftDelete;

    //更新网站信息
    public function edit($data)
    {
        $validate = new \app\common\validate\System();
        if (!$validate->check($data)) {
            return $validate->getError();
        }
        $webInfo = $this->find($data['id']);
        $webInfo->webname = $data['webname'];
        $webInfo->copyright = $data['copyright'];
        $result = $webInfo->save();
        if ($result) {
            return 1;
        } else {
            return "修改失败!";
        }
    }
}