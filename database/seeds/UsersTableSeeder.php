<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jane UserAdmin',
            'email' => 'jane@example.com',
            'password' => '$2y$10$zSj2NMsy7w/LIAzk9EddGeBbZ8p.4Qb5cLzEWr007ytyRTyHR9mbm',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Bob Moderator',
            'email' => 'bob@example.com',
            'password' => '$2y$10$LDVnBCI16c2knUSGCPdzDuOGLeq5b80XTpKOD/Mt0z.Q.Vw6X/14m',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Susan ThemeAdmin',
            'email' => 'susan@example.com',
            'password' => '$2y$10$1FcXTuYat1sp0oVqKgHsQO4dwzFsicMxWMW/Utbgcsfkq0bhqX9ii',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
