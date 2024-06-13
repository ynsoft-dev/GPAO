<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        
        $admin  = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = Hash::make('adminadmin');
        $admin->save();
        $admin->assignRole('admin');

        $operateur  = new User();
        $operateur->name = 'operateur';
        $operateur->email = 'operateur@operateur.com';
        $operateur->password = Hash::make('operateur');
        $operateur->save();
        $operateur->assignRole('operateur');

        $responsable  = new User();
        $responsable->name = 'responsable';
        $responsable->email = 'responsable@responsable.com';
        $responsable->password = Hash::make('responsable');
        $responsable->save();
        $responsable->assignRole('responsable');
 
        
    }

     
        
        
    
}