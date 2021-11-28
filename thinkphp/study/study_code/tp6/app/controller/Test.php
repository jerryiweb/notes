<?php

namespace app\controller;

use app\BaseController;
use think\facade\Request;

class Test extends BaseController
{
    public function index()
    {
        // 返回方法名
        // return '方法名：' . $this->request->action();
        // 返回实际路径
        return '实际路径：' . $this->app->getBasePath();
    }
    public function hello($value = '')
    {
        return 'Hello ' . $value;
    }
}
