<?php

use Illuminate\Database\Seeder;

class PresetBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preset_backgrounds')->insert([
            'background_name' => 'wood',
            'background_filename' => 'wood.jpg',
        ]);

        DB::table('preset_backgrounds')->insert([
            'background_name' => 'chalkboard',
            'background_filename' => 'chalkboard.jpg',
        ]);

        DB::table('preset_backgrounds')->insert([
            'background_name' => 'paper',
            'background_filename' => 'paper.jpg',
        ]);
    }
}
