<?php

namespace app\model;

use think\Model;

class User extends Model
{
    // 设置主键
    protected $pk = 'id';

    // 设置表
    protected $table = 'tp_user';

    // 模型初始化
    protected static function init()
    {
        parent::init();
    }
}
