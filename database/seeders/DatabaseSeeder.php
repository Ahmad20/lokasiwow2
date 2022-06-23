<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan dummy data untuk table user dan blog
        \App\Models\User::factory(10)->create();
        $this->call([
            BlogSeeder::class,
        ]);
        // Membaca sql untuk data post wisata
        DB::unprepared(file_get_contents('app/post1.sql'));
    }
}
