<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*\App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        /*============crear roles===================*/
        $adminRole = Role::create(['name' => 'admin']); //se puede hacer llamando al método
        $editorRole = new Role(['name' => 'editor']); //también se puede hacer como objeto
        $editorRole->save();

        /*============crear permisos===================*/
        //se pueden crear de ambas maneras, mediante el método y el objeto
        $createPerm = Permission::create(['name' => 'create']);
        $editPerm = Permission::create(['name' => 'edit']);

        /*===========Vincular los permisos a roles==================*/
        $adminRole->givePermissionTo([$createPerm, $editPerm]);
        $editorRole->givePermissionTo($editPerm);

        /*=============Crear usuarios y asignarles roles============*/
        //se puede usar el usuario con el método 'create'
        $adminUser = User::create([
            'name' => 'al',
            'email' => 'adelaqui@ibadia.cat',
            'password' => Hash::make('Badia123$'),
            'email_verified_at' => now()
        ]);
        $adminUser->assignRole($adminRole);//asigna el rol de administrador

        //tambien se puede crear el usuario como objeto
        $editorlUser = new User([
            'name' => 'juli',
            'email' => 'julian@ibadia.cat',
            'password' => Hash::make('Badia123$'),
            'email_verified_at' => now()
        ]);
        $editorlUser->assignRole($editorRole);//asigna el rol de editor

        $editorlUser->save();
    }
}
