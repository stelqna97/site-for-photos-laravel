<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
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
        DB::table('role_user')->truncate();

        $adminRole=Role::where('name','админ')->first();
        $userRole=Role::where('name','потребител')->first();

        $admin=User::create([
            'name'=>'admin',
            'email'=>'admin@admin.bg',
            'password'=> Hash::make('admin'),
            'role_id'=>$userRole->id
        ]);

        $user=User::create([
            'name'=>'user',
            'email'=>'user@user.bg',
            'password'=> Hash::make('user'),
            'role_id'=>$adminRole->id
        ]);

       


    }
}
