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
        \ProjManager\Entities\Client::truncate();
        factory(\ProjManager\Entities\Client::class, 10)->create();
    }
}
