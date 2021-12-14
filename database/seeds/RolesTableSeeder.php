<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'User Administrator',
            'description' => 'User Administrator Role, can edit admin permissions.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name' => 'Moderator',
            'description' => 'Moderator Role, can edit posts.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name' => 'Theme Manager',
            'description' => 'Theme Manage Role, can edit themes.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
