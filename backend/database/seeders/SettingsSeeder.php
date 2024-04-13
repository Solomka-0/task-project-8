<?php

namespace Database\Seeders;

use App\Models\UsersSetting;
use App\Notifications\ConfirmationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'key' => 'name',
                'type' => 'string',
                'is_basic' => true,
                'default' => null,
                'confirm_types' => json_encode([ConfirmationType::MAIL->value()]),
                'handler' => 'NameSettingsController',
            ],
            [
                'key' => 'phone',
                'type' => 'string',
                'is_basic' => true,
                'default' => null,
                'handler' => null,
            ],
            [
                'key' => 'email',
                'type' => 'string',
                'is_basic' => true,
                'default' => null,
                'handler' => null,
            ],
            [
                'key' => 'password',
                'type' => 'string',
                'is_basic' => true,
                'default' => null,
                'handler' => null,
            ],
            [
                'key' => 'important',
                'type' => 'boolean',
                'is_basic' => false,
                'default' => true,
                'confirm_types' => json_encode([ConfirmationType::MAIL->value()]),
                'handler' => 'ImportantSettingsController',
            ],
            [
                'key' => 'simple',
                'type' => 'boolean',
                'is_basic' => false,
                'default' => true,
                'handler' => null,
            ],
        ];

        foreach ($rows as $row) {
            UsersSetting::query()->firstOrCreate([
                'key' => $row['key'],
                'type' => $row['type'],
                'is_basic' => $row['is_basic'],
                'default' => $row['default'],
                'confirm_types' => $row['confirm_types'] ?? null,
                'handler' => $row['handler'] ?? null,
            ]);
        }
    }
}
