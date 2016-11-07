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
            'backgr_with_quote' => '5820e668691d61478551144.png',
            'quote' => 'Dad! I think apples have apple juice in them.',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => '5820e64b595941478551115.png',
            'quote' => 'The birds are singing because they\'re so happy I\'m awake.',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => '5820e67bc332b1478551163.png',
            'quote' => 'Are boats like floating houses?',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => '5820e68fada301478551183.png',
            'quote' => 'Look mommy, someone ate the moon!',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => '5820e6b9631851478551225.png',
            'quote' => 'I will miss you while I\'m sleeping...',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => '5820e709a37ad1478551305.png',
            'quote' => 'I never text and drive. Because I don\'t have a car. And I don\'t have a phone.',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => '5820e6d8914071478551256.png',
            'quote' => 'Why are trees not called two\'s or fours?',
            'child_id' => 1,
        ]);
        DB::table('quotes')->insert([
            'backgr_with_quote' => '5820e6f3247ff1478551283.png',
            'quote' => 'Mommy, you smell like wine!',
            'child_id' => 1,
        ]);
    }
}
