<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
	    $role->name = 'admin';
	    $role->display_name = 'Administrator';
	    $role->description = 'Administrator Role';
	    $role->save();

        DB::table("permission_role")->where("permission_role.role_id", $role->id)
            ->delete();

        $user = User::find(1);
        $user->attachRole($role->id);

        $role = Role::find($role->id);
        $role->attachPermission(1);
    }
}
