<?php

namespace app\controller;

use app\model\User;

class DataModel
{
    public function index()
    {
        // return json(User::select());
        return json(User::find(1));
    }
}
