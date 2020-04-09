<?php

use Illuminate\Database\Seeder;

class TypeQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_questions')->insert([
            'name' => 'Nhận biết'
        ]);
        DB::table('type_questions')->insert([
            'name' => 'Thông hiểu'
        ]);
        DB::table('type_questions')->insert([
            'name' => 'Vận dụng'
        ]);
        DB::table('type_questions')->insert([
            'name' => 'Nâng cao'
        ]);
    }
}
