<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory('ProjManager\Entities\User')->create(
            [
                'name' => 'Willian',
                'email' => 'willian@gmail.com',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]
        );

        $this->call(ClientTableSeeder::class);
        $this->call(ProjectTableSeeder::class);

        Model::reguard();
    }
}
