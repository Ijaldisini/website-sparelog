<?php

namespace Database\Seeders;

use App\Models\TransaksiToko;
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

        $this->call([
            Users::class,
            Supplier::class,
            Barang::class,
            TransaksiSeeder::class,
            TransaksiDetailSeeder::class,
            TransaksiTokoSeeder::class,
            TransaksiTokoDetailSeeder::class,
        ]);
    }
}
