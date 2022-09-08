<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                //admin権限を持つユーザー
                'name' => 'admin00',
                'email' => 'admin00@example.com',
                'password' => 'kaihatsu',
                'api_token' => Str::random(60),
                'is_admin' => true,
            ],
            [
                //admin権限をもたないユーザー
                'name' => 'test00',
                'email' => 'test00@example.com',
                'password' => 'kaihatsu',
                'api_token' => Str::random(60),
                'is_admin' => false,
            ],
        ]);
    }
}
