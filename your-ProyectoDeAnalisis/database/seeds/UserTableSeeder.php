<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Rol;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   

       
      
        $role_user = Rol::where('name', 'Docente')->first();
        $role_admin = Rol::where('name', 'Admin')->first();
        
        
        $user = new User();
        $user->first_name = 'Victor';
        $user->last_name = 'Rojas';
        $user->email = 'victor@hotmail.com';
        $user->password = bcrypt('victor');
        $user->cedula = '201578215';
        $user->fechaNacimiento = '1984-04-20';
        $user->sexo = 'M';
                   
        $user->activo = '1';

        $user->save();
        
        //atach a acta
        $user->roles()->attach($role_user);
        
        

        $admin = new User();
        $admin->first_name = 'Alex';
        $admin->last_name = 'Fuentes';
        $admin->email = 'alex@gmail.com';
        $admin->password = bcrypt('alex');
        $admin->cedula = '568514584';
        $admin->fechaNacimiento = '1974-12-22';
        
        $admin->sexo = 'M';
                  
        $admin->activo = '1';
        $admin->save();
        $admin->roles()->attach($role_user);
      

        $author = new User();
        $author->first_name = 'Yohana';
        $author->last_name = 'Castro';
        $author->email = 'yohana@yahoo.com';
        $author->password = bcrypt('yohana');
        $author->cedula = '16859548';
        $author->fechaNacimiento = '1994-04-20';
        
        $author->sexo = 'F';
                   
        $author->activo = '0';
        $author->save();
        $author->roles()->attach($role_admin);
       


    
    }
}
