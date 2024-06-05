<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher; // Ensure this line is present
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test' . uniqid() . '@example.com', // Ensure unique email
        ]);
        

        if (Teacher::count() == 0) {
            $this->call(TeacherSeeder::class);
        }
    }
}
