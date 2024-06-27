<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('metodes')->insert([
            ['name' => 'Workshope/Self Learning'],
            ['name' => 'Sharing Practice/Professional`s Talk'],
            ['name' => 'Discussion room'],
            ['name' => 'Coaching'],
            ['name' => 'Mentoring'],
            ['name' => 'Job Assignment'],
        ]);

        // DB::table('learning_activities')->insert([
        //     [
        //         'metode_id' => 1,
        //         'title' => 'Fudamental of Superintendance',
        //         'start_date' => '2024-01-02',
        //         'end_date' => '2024-01-05'
        //     ],
        //     [
        //         'metode_id' => 1,
        //         'title' => 'Introduction to TIC Industry',
        //         'start_date' => '2024-01-03',
        //         'end_date' => '2024-01-05'
        //     ],
        //     [
        //         'metode_id' => 1,
        //         'title' => 'Ridam "Bela Negara"',
        //         'start_date' => '2024-01-04',
        //         'end_date' => '2024-01-05'
        //     ],
        //     [
        //         'metode_id' => 1,
        //         'title' => 'Human Recource Generalist',
        //         'start_date' => '2024-01-05',
        //         'end_date' => '2024-01-10'
        //     ],
        //     [
        //         'metode_id' => 1,
        //         'title' => 'Basic Finance For Business',
        //         'start_date' => '2024-01-10',
        //         'end_date' => '2024-01-15'
        //     ],
        // ]);
    }
}
