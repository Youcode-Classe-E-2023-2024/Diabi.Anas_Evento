<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define roles
        $roles = [
            ['name' => 'Administrateur'],
            ['name' => 'Organisateurr'],
            ['name' => 'Utilisateur'],
        ];

        // Insert roles into the 'roles' table
        DB::table('roles')->insert($roles);
    }
}