<?php

use Illuminate\Database\Seeder;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \ProjManager\Entities\ProjectNote::truncate();
        factory(\ProjManager\Entities\ProjectNote::class, 50)->create();
    }
}
