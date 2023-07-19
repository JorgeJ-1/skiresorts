<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            ['role'=>'administrador'],
            ['role'=>'todopoderoso'],
            ['role'=>'moderador'],
            ['role'=>'supervisor'],
            ['role'=>'superusuario']
        ]);
        //
        DB::table('role_user')->insert([
            ['user_id'=>1, 'role_id'=>5],
            ['user_id'=>2, 'role_id'=>5],
            ['user_id'=>5, 'role_id'=>1],
            ['user_id'=>5, 'role_id'=>2],
        ]);
    }
}
