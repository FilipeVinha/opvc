<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Henrique Vieira',
            'username' => 'filipe.vinha',
            'email' => 'r8filipe@gmail.com',
            'password' => bcrypt('sysdba'),
            'auth_level' => 3,
            'banned' => 0,
        ]);
    }
}
