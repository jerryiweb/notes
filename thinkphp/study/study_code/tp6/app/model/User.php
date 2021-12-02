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

    // 设置字段信息
    // protected $schema = [
    //     'id' => 'int',
    //     'username' => 'stirng',
    //     'password' => 'string',
    //     'gender' => 'string',
    //     'email' => 'string',
    //     'price' => 'int',
    //     'details' => 'string',
    //     'uid' => 'int',
    //     'status' => 'int',
    //     'list' => 'string',
    //     'delete_time' => 'datetime',
    //     'create_time' => 'datetime',
    //     'update_time' => 'datetime'
    // ];

    // 是否严格区分大小写
    protected $strict = false;

    public function getUsername($id)
    {
        $obj = $this->find($id);
        return $obj->getAttr('username');
    }
}
