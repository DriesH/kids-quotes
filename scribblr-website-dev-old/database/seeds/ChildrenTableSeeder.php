<?php

use Illuminate\Database\Seeder;

class ChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('childrens')->insert([
            'name' => str_random(10),
            'user_id' => 1
        ]);
    }
}
