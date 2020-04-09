<?php

use Illuminate\Database\Seeder;

class TypeClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_classes')->insert([
            'name' => 'Đại số'
        ]);
        DB::table('type_classes')->insert([
            'name' => 'Hình học'
        ]);
    }
}
