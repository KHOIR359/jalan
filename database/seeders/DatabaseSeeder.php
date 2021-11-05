<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
          'name'=>'abdul khoir',
          'phone'=>'0881024826479',
          'email'=>'khoir359@gmail.com',
          'password'=> Hash::make('asd'),
          'role'=> 1,
          'created_at'=> '2021-10-21 16:47:55',
          'updated_at'=> '2021-10-21 16:47:55',
        ]);
    }
}
