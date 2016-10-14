<?php

use Illuminate\Database\Seeder;
use App\Rol;
class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Rol();
        $role_user->name = 'Docente';
        $role_user->description = 'un docente';
        $role_user->save();
        

        $role_admin = new Rol();
        $role_admin->name = 'Admin';
        $role_admin->description = 'un Admin';
        $role_admin->save();
    }
}
