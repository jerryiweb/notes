<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;
use app\model\User;

class DataTest extends BaseController
{
    public function index()
    {
        // $user = Db::connect('mysql')->table('tp_user')->select();
        // $user = Db::table('tp_user')->where('id', 1)->find();
        // return Db::getLastSql();
        // $user = Db::table('tp_user')->where('id', 500)->findOrFail();
        // $user = Db::table('tp_user')->where('id', 500)->findOrEmpty();
        // $user = Db::table('tp_user')->where('status', 3)->selectOrFail();
        // $user = Db::table('tp_user')->select();
        // return json($user);
        // $user = Db::name('user')->select()->toArray();
        // return Db::name('user')->where('id', 3)->value('username');
        // dump(Db::name('user')->column('username', 'id'));
        // dump($user);
        // Db::name('user')->chunk(2, function ($users) {
        //     foreach ($users as $user) {
        //         dump($user);
        //     }
        //     echo 1;
        // });
        // $cursor = Db::name('user')->cursor();
        // foreach ($cursor as $user) {
        //     dump($user);
        // }
        // $user = Db::name('user')->order('id', 'desc')->select();
        // dump($user);
        // return json($user);
        $userQuery = Db::name('user');
        // $user = $userQuery->where('id', 3)->find();
        // return json($user);
        $data1 = $userQuery->order('id', 'desc')->select();
        $data2 = $userQuery->select();
        return Db::getLastSql();
    }
    public function demo()
    {
        $user = Db::connect('demo')->table('tp_user')->select();
        return json($user);
    }
    public function getUser()
    {
        $user = User::select();
        return json($user);
    }
    public function insert()
    {
        $data = [
            'id' => 10,
            'username' => 'jerryiweb',
            'password' => 'adfasdf',
            'email' => 'admin@ww.com',
            'gender' => '男',
            'price' => 120,
            'details' => 'adfsadf',
            'uid' => 1004,
            'status' => 1,
            'list' => 'null',
            'delete_time' => '2021-11-27 22:11:59',
            'update_time' => '2021-11-27 22:11:59',
            'create_time' => '2021-11-27 22:11:59',
        ];
        // Db::name('user')->replace()->insert($data);
        // return Db::getLastSql();
        // return Db::name('user')->insertGetId($data);
    }
    public function insertAll()
    {
        $data = [[
            'id' => 11,
            'username' => 'jerryiweb11',
            'password' => 'adfasdf',
            'email' => 'admin@ww.com',
            'gender' => '男',
            'price' => 120,
            'details' => 'adfsadf',
            'uid' => 1004,
            'status' => 1,
            'list' => 'null',
            'delete_time' => '2021-11-27 22:11:59',
            'update_time' => '2021-11-27 22:11:59',
            'create_time' => '2021-11-27 22:11:59',
        ], [
            'id' => 12,
            'username' => 'jerryiweb12',
            'password' => 'adfasdf',
            'email' => 'admin@ww.com',
            'gender' => '男',
            'price' => 120,
            'details' => 'adfsadf',
            'uid' => 1004,
            'status' => 1,
            'list' => 'null',
            'delete_time' => '2021-11-27 22:11:59',
            'update_time' => '2021-11-27 22:11:59',
            'create_time' => '2021-11-27 22:11:59',
        ]];
        return Db::name('user')->insertAll($data);
    }
    public function update()
    {
        // $data = [
        //     'id' => 6,
        //     'username' => 'jerryiweb6',
        // ];
        // return Db::name('user')->where('id', 6)->exp('username', 'UPPER(username)')->update();
        // return Db::name('user')->where('id', 6)
        //     ->inc('price', 2)
        //     ->dec('status', 2)
        //     ->update();
        // return Db::name('user')->where('id', 6)
        //     ->update([
        //         'email' => Db::raw('UPPER(email)'),
        //         'price' => Db::raw('price + 2'),
        //         'status' => Db::raw('status - 2')
        //     ]);
        return Db::name('user')->where('id', 12)->save(['username' => '李白']);
    }
    public function delete()
    {
        // return Db::name('user')->delete(12);
        // return Db::name('user')->delete([48, 49, 50]);
        return Db::name('user')->where('id', 11)->delete();
    }
    public function query()
    {
        // return json(Db::name('user')->where('id', '=', 10)->find());
        // $users = Db::name('user')->where('id', '<>', 1)->select();
        // return json($users);
        // $users = Db::name('user')->where('email', 'like', '%jerryiweb%')->select();
        // $users = Db::name('user')->whereNotLike('email', 'admin%')->select();
        // $users = Db::name('user')->where('email', 'like', ['wu%', 'tang%'], 'or')->select();
        // $users = Db::name('user')->where('id', 'between', '4,8')->select();
        // $users = Db::name('user')->whereNotBetween('id', [4, 8])->select();
        // $users = Db::name('user')->where('id', 'in', '4, 6, 8')->select();
        // $users = Db::name('user')->whereNotIn('id', [4, 6, 8])->select();
        // $users = Db::name('user')->where('email', 'not null')->select();
        // $users = Db::name('user')->whereNotNull('email')->select();
        $users = Db::name('user')->where('id', 'exp', 'IN (4, 6, 8)')->select();
        return json($users);
    }
    public function time()
    {
        // $users = Db::name('user')->where('create_time', '>', '2021-11-26 21:50:51')->select();
        // $users = Db::name('user')->where('create_time', 'between', '2021-11-25 21:50:00,2021-11-26 21:50:51')->select();
        $users = Db::name('user')->where('create_time', 'not between', '2021-11-25 21:50:00,2021-11-26 21:50:51')->select();
        return json($users);
    }
    public function poly()
    {
        // $result = Db::name('user')->count();
        // $result = Db::name('user')->count('uid');
        // return Db::getLastSql();
        // $result = Db::name('user')->max('price');
        // $result = Db::name('user')->min('price');
        // $result = Db::name('user')->min('email', false);
        // $result = Db::name('user')->avg('price');
        // $result = Db::name('user')->sum('price');
        // return json($result);
        // $result = Db::name('user')->fetchSql(true)->select();
        // $result = Db::name('user')->buildSql(true);
        // $result = Db::query('SELECT * FROM tp_user');
        $result = Db::execute('UPDATE tp_user SET username="ADMIN" WHERE id = 4');
        return json($result);
    }
}
