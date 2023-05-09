<?php

namespace Database\Seeders;

use App\Models\Konverteringer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KonverteringerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Konverteringer::factory()
        ->count(15)
        ->create();
    }
}
