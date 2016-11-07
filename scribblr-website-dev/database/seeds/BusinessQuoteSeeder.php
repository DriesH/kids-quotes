<?php

use Illuminate\Database\Seeder;

class BusinessQuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_quotes')->insert([
            'illustration_name' => 'apple.png',
            'quote_id' => 1,
            'theme_id' => 1,
        ]);
        DB::table('business_quotes')->insert([
            'illustration_name' => 'bird.png',
            'quote_id' => 2,
            'theme_id' => 2,
        ]);
        DB::table('business_quotes')->insert([
            'illustration_name' => 'boat.png',
            'quote_id' => 3,
            'theme_id' => 3,
        ]);
        DB::table('business_quotes')->insert([
            'illustration_name' => 'clouds.png',
            'quote_id' => 4,
            'theme_id' => 1,
        ]);
        DB::table('business_quotes')->insert([
            'illustration_name' => 'elf.png',
            'quote_id' => 5,
            'theme_id' => 5,
        ]);
        DB::table('business_quotes')->insert([
            'illustration_name' => 'moon.png',
            'quote_id' => 6,
            'theme_id' => 1,
        ]);
        DB::table('business_quotes')->insert([
            'illustration_name' => 'bed.png',
            'quote_id' => 7,
            'theme_id' => 8,
        ]);
        DB::table('business_quotes')->insert([
            'illustration_name' => 'car.png',
            'quote_id' => 8,
            'theme_id' => 3,
        ]);
        DB::table('business_quotes')->insert([
            'illustration_name' => 'tooth_fairy.png',
            'quote_id' => 9,
            'theme_id' => 5,
        ]);
        DB::table('business_quotes')->insert([
            'illustration_name' => 'tree.png',
            'quote_id' => 10,
            'theme_id' => 1,
        ]);
        DB::table('business_quotes')->insert([
            'illustration_name' => 'wine.png',
            'quote_id' => 11,
            'theme_id' => 9,
        ]);
    }
}
