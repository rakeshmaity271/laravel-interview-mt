<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->delete();
        $users = [
            array(
                'role_id' => 1,
                'user_id' => 1,
            ),
            array(
                'role_id' => 2,
                'user_id' => 2,
            ),
        ];
        DB::table('user_roles')->insert($users);
    }
}
