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
        \ProjManager\Models\Client::truncate();
        factory(\ProjManager\Models\Client::class, 10)->create();
    }
}
