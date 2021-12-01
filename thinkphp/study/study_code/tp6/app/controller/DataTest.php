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
            'id' => 15,
            'username' => 'jerryiweb',
            'password' => 'adfasdf',
            'email' => 'admin@ww.com',
            'gender' => '男',
            'price' => 120,
            'details' => 'adfsadf',
            'uid' => 1015,
            'status' => 1,
            'list' => 'null',
            'delete_time' => '2021-11-27 22:11:59',
            'update_time' => '2021-11-27 22:11:59',
            'create_time' => '2021-11-27 22:11:59',
        ];
        // return Db::name('user')->field('username, password, email')->insert($data);
        // return Db::name('user')->insert($data);
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
    public function linkUp()
    {
        // $user = Db::name('user')->where('id', '>', '6')->select();
        // return json($user);
        // 关联数组查询
        // $user = Db::name('user')->where([
        //     'gender' => '男',
        //     'price' => 120
        // ])->select();
        // 数组内数组
        // $user = Db::name('user')->where([
        //     ['gender', '=', '男'],
        //     ['price', '<', '120']
        // ])->select();
        // 数组拼接
        // $map[] = ['gender', '=', '男'];
        // $map[] = ['price', 'in', [60, 80, 120]];
        // $user = Db::name('user')->where($map)->select();
        // 字符串形式
        // $user = Db::name('user')->whereRaw('gender = "男" AND price IN (60, 80, 120)')->select();
        // $users = Db::name('user')->field('id, username as name, email')->select();
        // return Db::getLastSql();
        // $users = Db::name('user')->fieldRaw('id, SUM(price)')->select();
        // $users = Db::name('user')->field(true)->select();
        // $users = Db::name('user')->withoutField('details')->select();
        // return json($users);
        $users = Db::name('user')->alias('a')->select();
        return Db::getLastSql();
    }
    public function linkdown()
    {
        /**
         * limit
         */

        // 1
        // $users = Db::name('user')->limit(0, 5)->select();
        // return json($users);
        // 2
        // $users = Db::name('user')->limit(2, 5)->select();
        // return json($users);
        // 3
        // $users = Db::name('user')->limit(0, 5)->select();
        // $users = Db::name('user')->limit(5, 5)->select();
        // return json($users);

        /**
         * page
         */

        // 1
        // $users = Db::name('user')->page(1, 5)->select();
        // $users = Db::name('user')->page(2, 5)->select();
        // return json($users);

        /**
         * order
         */

        // 1
        // $users = Db::name('user')->order('id', 'desc')->select();
        // return json($users);
        // 2
        // $users = Db::name('user')->order(['create_time' => 'desc', 'price' => 'asc'])->select();
        // return Db::getLastSql();
        // return json($users);
        // 3
        // $users = Db::name('user')->orderRaw('FIELD(username, "jerryiweb") DESC')->select();
        // return Db::getLastSql();
        // return json($users);

        /**
         * group
         */

        // 1
        // $users = Db::name('user')->field('gender, SUM(price)')->group('gender')->select();
        // return json($users);
        // 2
        // $users = Db::name('user')->fieldRaw('gender, SUM(price)')->group('gender, password')->select();
        // return Db::getLastSql();
        // return json($users);

        /**
         * having
         */

        // 1
        $users = Db::name('user')->fieldRaw('gender, SUM(price)')->group('gender')->having('SUM(price)<600')->select();
        return json($users);
    }
    public function advanced()
    {
        // $users = Db::name('user')->select();
        // return json($users);
        // 1
        // $users = Db::name('user')
        //     ->where('username|email', 'like', '%ww%')
        //     ->where('price&uid', '>', 0)
        //     ->select();
        // return Db::getLastSql();
        // return json($users);

        // 2
        // $users = Db::name('user')->where([
        //     ['id', '>', 0],
        //     ['status', '=', 1],
        //     ['price', '>=', 90],
        //     ['email', 'like', '%ww%']
        // ])->select();
        // return Db::getLastSql();
        // return json($users);

        // 3
        // $users = Db::name('user')->where([
        //     ['status', '=', 1],
        //     ['price', 'exp', Db::raw('>80')]
        // ])->select();
        // return Db::getLastSql();
        // return json($users);

        // 4
        // $map = [
        //     ['id', '>', 0],
        //     ['price', 'exp', Db::raw('>=80')],
        //     ['email', 'like', '%ww%'],
        // ];
        // $users = Db::name('user')->where([$map])->where('status', 1)->select();
        // return Db::getLastSql();

        // 5
        // $map1 = [
        //     ['username', 'like', '%iwe%'],
        //     ['email', 'like', '%ww%']
        // ];
        // $map2 = [
        //     ['username', 'like', 'jerry%'],
        //     ['email', 'like', 'admin%']
        // ];
        // $users = Db::name('user')->whereOr([$map1, $map2])->select();
        // return Db::getLastSql();
        // return json($users);

        // 6
        // $users = Db::name('user')->whereRaw('(username LIKE "%ww%" AND email LIKE "admin%") OR (price > 80)')->select();
        // return json($users);

        // 7
        // $users = Db::name('user')->where(function ($query) {
        //     $query->where('id', '>', 10);
        // })->whereOr(function ($query) {
        //     $query->where('username', 'like', '%ww%');
        // })->select();
        // return json($users);


        // 8
        $users = Db::name('user')->whereRaw('(username LIKE :username AND email LIKE :email) OR (price > :price)', ['username' => '%erry%', 'email' => '%ww%', 'price' => 80])->select();
        return json($users);
    }
    public function quick()
    {
        // $users = Db::name('user')->whereColumn('update_time', '>', 'create_time')->select();
        // return Db::getLastSql();
        // return json($users);

        // $user = Db::name('user')->whereEmail('admin@jerryiweb.com')->find();
        // $user = Db::name('user')->whereUsername('jerryiweb')->find();
        // return json($user);

        // return json(Db::name('user')->getByEmail('admin@jerryiweb.com'));

        // return json(Db::name('user')->getFieldByEmail('admin@jerryiweb.com', 'username'));

        $user = Db::name('user')->when(true, function ($query) {
            $query->where('price', '>', 110);
        }, function ($query) {
            $query->where('username', 'like', '%jerry%');
        })->select();
        return json($user);
    }
    public function transation()
    {
        // 自动
        // Db::Transaction(function () {
        //     Db::name('user')->where('id', 1)->save(['price' => Db::raw('price + 3')]);
        //     Db::name('user1')->where('id', 2)->save(['price' => Db::raw('price - 3')]);
        // });

        // 手动
        // Db::startTrans();
        // try {
        //     Db::name('user')->where('id', 1)->save(['price' => Db::raw('price + 3')]);
        //     Db::name('user1')->where('id', 2)->save(['price' => Db::raw('price - 3')]);
        //     Db::commit();
        // } catch (\Exception $e) {
        //     dump($e);
        //     Db::rollback();
        // }

        $users = Db::name('user')->withAttr('email', function ($value, $data) {
            return strtoupper($value);
        })->select();
        return json($users);
    }
}
