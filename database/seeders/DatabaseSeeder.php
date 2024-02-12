<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Student::factory(10)->create();

        Kelas::create([
            'kelas' => '12 PPLG 1',
        ]);

        Kelas::create([
            'kelas' => '12 PPLG 2',
        ]);

        Kelas::create([
            'kelas' => '10 PPLG 1',
        ]);

        Kelas::create([
            'kelas' => '10 PPLG 2',
        ]);

        Kelas::create([
            'kelas' => '11 PPLG 1',
        ]);

        Kelas::create([
            'kelas' => '11 PPLG 2',
        ]);
    }
}
