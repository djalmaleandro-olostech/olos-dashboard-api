<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Dev',
                'status' => 1
            ],
            [
                'name' => 'Scrum Master',
                'status' => 1
            ],
            [
                'name' => 'Desenvolvedor',
                'status' => 1
            ],
            [
                'name' => 'QA',
                'status' => 1
            ],
            [
                'name' => 'Product Owner',
                'status' => 1
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
