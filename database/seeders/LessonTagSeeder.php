<?php

namespace Database\Seeders;

use App\Models\LessonTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LessonTag::factory()
        ->count(250)
        ->create();
    }
}
