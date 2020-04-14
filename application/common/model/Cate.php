<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2019/9/12
 * Time: 17:28
 */

namespace app\common\model;


use think\Model;
use traits\model\SoftDelete;

class Cate extends Model
{
    //软删除
    use SoftDelete;

    //关联文章
    public function article()
    {
        return $this->hasMany('Article', 'cate_id', 'id');    //hanMany一对多的关系
    }

    //栏目添加
    public function add($data)
    {
        $rule = [
            'catename|栏目名称' => 'require|unique:cate',
            'sort|排序' => 'require|number'
        ];
        $validate = new \app\common\validate\Cate($rule);

        if (!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }else {
            $result = $this->allowField(true)->save($data);
            if ($result) {
                return 1;
            }else {
                return '栏目添加失败!';
            }
        }
    }

    //栏目排序
    public function sort($data)
    {
        $sort = [
            'sort|排序' => 'require|number'
        ];
        $validate = new \app\common\validate\Cate($sort);
        if (!$validate->scene('sort')->check($data)) {
            return $validate->getError();
        }
        $cateInfo = $this->find($data['id']);
        $cateInfo->sort = $data['sort'];    //更新sort字段
        $result = $cateInfo->save();
        if ($result) {
            return 1;
        }else {
            return "排序失败!";
        }
    }

    //栏目编辑
    public function edit($data)
    {
        $edit = [
            'catename|栏目名称' => 'require|unique:cate',
        ];
        $validate = new \app\common\validate\Cate($edit);
        if (!$validate->scene('edit')->check($data)) {
            return $validate->getError();
        }
        $cateInfo = $this->find($data['id']);   //先查询单条数据
        $cateInfo->catename = $data['catename'];    //更新数据
        $result = $cateInfo->save();    //数据添加
        if ($result) {
            return 1;
        }else {
            return "栏目编辑失败!";
        }
    }
}