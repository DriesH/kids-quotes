<?php

use Illuminate\Database\Seeder;

class DataWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_websites')->insert([
            'name' => 'Personal',
            'BannerBg' => 'banner-background-personal.jpg',
            'subTextBtn' => "It's free.",
            'BannerMsg' => 'Memories for later.',
        ]);

        DB::table('data_websites')->insert([
            'name' => 'Business',
            'BannerBg' => 'banner-background-business.jpg',
            'subTextBtn' => "For as low as 9.99$&#47;month.",
            'BannerMsg' => 'The best ideas are born in the mind of a child.',
        ]);
    }
}
