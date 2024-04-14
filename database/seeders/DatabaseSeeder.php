<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $departs =[
            'bscs',
            'ENglish',
        ];
        foreach($departs as $depart){
            Department::create(['name' => $depart]);
        }
    }
}
