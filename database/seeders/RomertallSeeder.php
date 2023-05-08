<?php

namespace Database\Seeders;

use App\Models\Romertall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RomertallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {
        Romertall::factory()
        ->count(25)
        ->hasKonverteringer(10)
        ->create();
    }
}
