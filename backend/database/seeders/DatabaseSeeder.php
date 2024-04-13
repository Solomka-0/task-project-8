<?php

namespace Database\Seeders;

use App\Models\SimpleUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SimpleUsersSeeder::class,
            SettingsSeeder::class,
        ]);
    }
}
