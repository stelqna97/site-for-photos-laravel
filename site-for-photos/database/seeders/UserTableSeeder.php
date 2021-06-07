<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Schema::disableForeignKeyConstraints();

        User::truncate();

        $adminRole=Role::where('name','админ')->first();
        $userRole=Role::where('name','потребител')->first();

        $admin=User::create([
            'name'=>'admin',
            'email'=>'admin@admin.bg',
            'password'=> Hash::make('admin'),
            'role_id'=>$adminRole->id
        ]);

     

        $user=User::create([
            'name'=>'user',
            'email'=>'user@user.bg',
            'password'=> Hash::make('user'),
            'role_id'=>$userRole->id
        ]);
    }
}
