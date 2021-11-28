<?php

namespace app\controller;

use app\BaseController;

class HelloWorld extends BaseController
{
    public function index()
    {
        return 'HelloWorld Controller index method';
    }
    public function outputJson()
    {
        $data = [1, 2, 3, 4, 5];
        halt('中断输出');
        return json($data);
    }
}
