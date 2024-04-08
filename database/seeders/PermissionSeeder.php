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
            'visitor-list',
            'visitor-create',
            'visitor-edit',
            'visitor-delete',
            'employee-list',
            'employee-create',
            'employee-edit',
            'employee-delete',
            'event-list',
            'event-create',
            'event-edit',
            'event-delete',
         ];
         
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
