<?php

use Illuminate\Database\Seeder;
use App\User;
use App\AdminAccount;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=new AdminAccount;
        $admin->save();
        $user = User::create([
            'name' => 'Upsua admin',
            'phone' => '695932023',
            'email' => 'upsua@upsua.com',
            'country_id' => 39,
            'email_verified_at' => now(),
            'password' => bcrypt('upsua123'),
            'userable_type' => 'App\\AdminAccount',
            'userable_id'=> $admin->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
