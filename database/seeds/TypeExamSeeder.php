<?php

use Illuminate\Database\Seeder;

class TypeExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_exams')->insert([
            'name' => 'Đề kiểm tra 15 phút',
            'time_limit' => 15
        ]);
        DB::table('type_exams')->insert([
            'name' => 'Đề kiểm tra 45 phút',
            'time_limit' => 45
        ]);
        DB::table('type_exams')->insert([
            'name' => 'Đề thi thử 60 phút',
            'time_limit' => 60
        ]);
    }
}
