<?php

namespace Database\Seeders;

use App\Models\SimpleUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SimpleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SimpleUser::query()->firstOrCreate([
            'name' => 'Test User',
            'phone' => '79009508230',
            'email' => 'maks1mkrasyuk@yandex.ru',
            'password' => 'root',
        ]);
    }
}
