<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PresetBackgroundSeeder::class);
        $this->call(ThemeSeeder::class);
        $this->call(DataWebsiteSeeder::class);
        $this->call(QuoteSeeder::class);
    }
}
