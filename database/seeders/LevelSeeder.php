<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 7; $x <= 12; $x++) {
            Level::create([
                'level' => 'Grade ' . $x,
            ]);
        }
    }
}
