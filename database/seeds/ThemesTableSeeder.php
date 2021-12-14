<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'Cyborg',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('themes')->insert([
            'name' => 'Darkly',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('themes')->insert([
            'name' => 'Flatly',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('themes')->insert([
            'name' => 'Lux',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('themes')->insert([
            'name' => 'Pulse',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/pulse/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
