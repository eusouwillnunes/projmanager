<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \ProjManager\Client::truncate();
        factory(\ProjManager\Client::class, 10)->create();
    }
}
