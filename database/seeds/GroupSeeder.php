<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'Admin',
            'class' => 0,
            'description' => 'This is admin group (contains teachers)',
        ]);
    }
}
