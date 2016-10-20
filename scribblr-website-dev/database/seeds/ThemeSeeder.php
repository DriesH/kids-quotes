<?php

use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $themes = array("Nature", "Animals", "Tranportation", "Machines", "Imaginary", "School", "Friends", "Family", "Food");

        for ($i=0; $i < count($themes); $i++) {
            DB::table('themes')->insert([
                'theme_name' => $themes[$i],
            ]);
        }

    }
}
