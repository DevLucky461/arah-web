<?php

namespace Database\Seeders;

use App\Models\CoinAccount;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'coin management']);
        Permission::create(['name' => 'view dashboard']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('view dashboard');

        // or may be done by chaining
       /* $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']);*/

        $role = Role::create(['name' => 'moderator']);
        $role->givePermissionTo(Permission::all());


        $user = User::create(['name'=>'Jerry', 'email'=> 'jerry@yahoo.com','email_verified_at'=> now(), 'password'=>Hash::make("88888888")]);
        $user->assignRole('moderator');
        UserInfo::create(['user_id'=> $user->id,'phone' =>88888880,'nric' => 88888880,'nu_member' => 'nu_member1','interested_quantity'=>0]);
        CoinAccount::create(['user_id'=> $user->id,'initial_coin' => 1000000, 'balance' => 1000000]);

        $user = User::create(['name'=>'Andy', 'email'=> 'andy@yahoo.com','email_verified_at'=> now(), 'password'=>Hash::make("88888888")]);
        $user->assignRole('moderator');
        UserInfo::create(['user_id'=> $user->id,'phone' =>88888881,'nric' => 88888881,'nu_member' => 'nu_member1','interested_quantity'=>0]);
        CoinAccount::create(['user_id'=> $user->id,'initial_coin' => 1000000, 'balance' => 1000000]);

        $user = User::create(['name'=>'Ivan', 'email'=> 'ivan@yahoo.com','email_verified_at'=> now(), 'password'=>Hash::make("88888888")]);
        $user->assignRole('moderator');
        UserInfo::create(['user_id'=> $user->id,'phone' =>88888882,'nric' => 88888882,'nu_member' => 'nu_member1','interested_quantity'=>0]);
        CoinAccount::create(['user_id'=> $user->id,'initial_coin' => 1000000, 'balance' => 1000000]);

        $user = User::create(['name'=>'Lanz', 'email'=> 'lanz@yahoo.com','email_verified_at'=> now(), 'password'=>Hash::make("88888888")]);
        $user->assignRole('moderator');
        UserInfo::create(['user_id'=> $user->id,'phone' =>88888883,'nric' => 88888883,'nu_member' => 'nu_member1','interested_quantity'=>0]);
        CoinAccount::create(['user_id'=> $user->id,'initial_coin' => 1000000, 'balance' => 1000000]);

        $user = User::create(['name'=>'Test Account', 'email'=> 'test@yahoo.com','email_verified_at'=> now(), 'password'=>Hash::make("88888888")]);
        $user->assignRole('moderator');
        UserInfo::create(['user_id'=> $user->id,'phone' =>88888884,'nric' => 88888884,'nu_member' => 'nu_member1','interested_quantity'=>0]);
        CoinAccount::create(['user_id'=> $user->id,'initial_coin' => 1000000, 'balance' => 1000000]);
    }
}
