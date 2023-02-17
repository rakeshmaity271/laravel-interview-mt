<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $roles = [
            array(
                'name' => 'Administrator',
                'slug' => 'administrator',
            ),
            array(
                'name' => 'User',
                'slug' => 'user',
            ),
        ];
        DB::table('roles')->insert($roles);
    }
}
