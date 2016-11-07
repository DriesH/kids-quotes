<?php

use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make one child first
        DB::table('children')->insert([
            'childName' => 'Dries',
            'gender' => 'girl',
            'user_id' => 1,
        ]);

        DB::table('quotes')->insert([
            'backgr_with_quote' => 'apples.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => 'bird.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => 'boat.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => 'clouds.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => 'elves.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => 'moon.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => 'night.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => 'street.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => 'toothfairy.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => 'trees.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => 'wine.jpg',
            'quote' => ' ',
            'child_id' => 1,
        ]);
    }
}
