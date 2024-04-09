<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-show',
            'visitor-list',
            'visitor-create',
            'visitor-show',
            'visitor-edit',
            'visitor-delete',
            'employee-list',
            'employee-create',
            'employee-show',
            'employee-edit',
            'employee-delete',
            'event-list',
            'event-create',
            'event-show',
            'event-edit',
            'event-delete',
         ];
         
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
