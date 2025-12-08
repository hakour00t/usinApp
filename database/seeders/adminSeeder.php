<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $role = Role::create(['name' => 'superAdmin']);
        $user = User::create([
            'first_name' => 'abdelhak',
            'last_name' => 'koal',
            'adress' => 'oumelboighi',
            'grad'=> 'Aspirant',
            'date' => '1999-01-24',
            'email' => 'abdelhak.koal@app.com',
            'password' => Hash::make('abedelhakAdmin') 
        ]);

        $role->givePermissionTo(Permission::all());

        $user->syncRoles($role);
    }
}
