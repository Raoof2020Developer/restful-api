<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // factory(App\User::class, 20)->create();
        User::factory()
            ->count(20)
            ->create();
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10). "@gmail.com",
        //     'password' => Hash::make('password')
        // ]);
    }
}
 