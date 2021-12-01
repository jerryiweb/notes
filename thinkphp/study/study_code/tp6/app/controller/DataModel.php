<?php

namespace app\controller;

use app\model\User as UserModel;
use think\facade\Db;

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
    public function update()
    {
        // $user = UserModel::find(15);
        // $user->username = '李黑';
        // $user->password = 'lihei';
        // $user->save();

        // $user = UserModel::where('username', '李白')->find();
        // $user->username = '李白';
        // $user->password = 'libai123';
        // $user->price = Db::raw('price + 3');
        // $user->allowField(['username', 'password'])->save();

        // $list = [
        //     ['id' => 8, 'username' => 'user8', 'password' => md5('user8')],
        //     ['id' => 7, 'username' => 'user7', 'password' => md5('user7')],
        //     ['id' => 9, 'username' => 'user9', 'password' => md5('user9')],
        // ];
        // $user = new UserModel();
        // $user->saveAll($list);

        // UserModel::update([
        //     'id' => 6,
        //     'username' => 'user6',
        //     'password' => md5('user6')
        // ]);

        // UserModel::update([
        //     'username' => 'user666',
        //     'password' => md5('user666')
        // ], ['id' => 6]);

        UserModel::update([
            'username' => 'user777',
            'password' => 'user777'
        ], ['id' => 7], ['username', 'password']);
    }
}
