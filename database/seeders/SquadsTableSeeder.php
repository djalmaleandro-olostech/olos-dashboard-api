<?php

namespace Database\Seeders;

use App\Models\Squad;
use Illuminate\Database\Seeder;

class SquadsTableSeeder extends Seeder
{
    public function run(): void
    {
        $squads = [
            [
                'name' => 'APPocalipse',
                'status' => 1,
            ],
            [
                'name' => 'CapsLoki',
                'status' => 1,
            ],
            [
                'name' => 'TylenOlos',
                'status' => 1,
            ],
            [
                'name' => 'CodeOfDuty',
                'status' => 1,
            ],
            [
                'name' => 'LediQueimado',
                'status' => 1,
            ]
            
        ];

        foreach ($squads as $squad) {
            Squad::create($squad);
        }
    }
}
