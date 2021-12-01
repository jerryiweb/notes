<?php

namespace app\controller;

use app\model\User as UserModel;

class DataModel
{
    public function index()
    {
        // return json(User::select());
        return json(UserModel::find(1));
    }
    public function insert()
    {
        // $user = new UserModel();
        // $user->id = 17;
        // $user->username = '赵四';
        // $user->password = 'zhaosi';
        // $user->gender = '男';
        // $user->email = 'admin@zhaosi.com';
        // $user->price = 130;
        // $user->details = '321';
        // $user->uid = 1018;
        // $user->update_time = '2021-11-26 21:50:57';
        // $user->delete_time = '2021-11-26 21:50:57';
        // $user->create_time = '2021-11-26 21:50:57';
        // $user->status = 1;
        // $user->list = 'null';
        // $user->save();

        $user = new UserModel();
        $user->save([
            'id' => 18,
            'username' => '王五',
            'email' => 'wangwu@qq.com',
            'status' => 1,
            'list' => 'null',
            'password' => 'wangwu',
            'gender' => '女',
            'price' => 200,
            'details' => '200',
            'uid' => 1020,
            'update_time' => '2021-11-26 21:50:57',
            'delete_time' => '2021-11-26 21:50:57',
            'create_time' => '2021-11-26 21:50:57'
        ]);
    }
    public function delete()
    {
        $user = UserModel::find(18);
        dump($user->delete());
    }
}
