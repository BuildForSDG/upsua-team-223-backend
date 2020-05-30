<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-admin-create',
           'user-admin-edit',
           'user-delete',
           'user-other-create',
           'user-other-edit',
           'account-management',
           'country-list',
           'country-create',
           'country-edit',
           'country-delete',
           'locality-list',
           'locality-create',
           'locality-edit',
           'locality-delete',
           'transaction-list',
           'transaction-create',
           'transaction-edit',
           'transaction-delete',
           'payment-list',
           'payment-create',
           'payment-edit',
           'payment-delete',
           'payment-cost-list',
           'payment-cost-create',
           'payment-cost-edit',
           'payment-cost-delete',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
