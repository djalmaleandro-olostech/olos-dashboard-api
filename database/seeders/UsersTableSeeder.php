<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Djalma Leandro',
                'email' => 'djalma.leandro@olostech.com',
                'password' => bcrypt('123456'),
                'status' => 1,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}