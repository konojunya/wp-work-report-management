<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'us_name' => '齊藤新三',
            'us_mail' => 'architshin@websarva.com',
            'password' => bcrypt('hogehoge'),
            'us_auth' => 1
        ]);
    }
}
