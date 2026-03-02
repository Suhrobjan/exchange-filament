<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $this->call([
            SettingSeeder::class,
            MenuSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
            AnnouncementSeeder::class,
            BrokerSeeder::class,
            RegionalOfficeSeeder::class,
            ContentSeeder::class,
            TradingDataSeeder::class,
            PageSeeder::class,
        ]);
    }
}
