<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \ProjManager\Entities\User::truncate();
        factory(\ProjManager\Entities\User::class, 10)->create();
    }
}
