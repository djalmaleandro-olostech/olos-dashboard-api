<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                //id: 1
                'name' => 'Administrativo',
                'icon' => 'admin_panel_settings',
                'route' => null,
                'parent_id' => null,
                'order' => 1,
                'status' => 1,
                'exclusive_dev' => 0
            ],
            [
                //id: 2
                'name' => 'Usuários',
                'route' => '/users',
                'icon' => 'manage_accounts',
                'parent_id' => 1,
                'order' => 2,
                'status' => 1,
                'exclusive_dev' => 0
            ],
            [
                //id: 3
                'name' => 'Perfis',
                'route' => '/roles',
                'icon' => 'groups',
                'parent_id' => 1,
                'order' => 1,
                'status' => 1,
                'exclusive_dev' => 0
            ],
            [
                //id: 4
                'name' => 'Menus',
                'route' => '/menus',
                'icon' => 'menu',
                'parent_id' => 1,
                'order' => 1,
                'status' => 1,
                'exclusive_dev' => 1
            ],
            [
                //id: 5
                'name' => 'Pessoas',
                'route' => null,
                'icon' => 'diversity_3',
                'parent_id' => null,
                'order' => 2,
                'status' => 1,
                'exclusive_dev' => 0
            ],
            [
                //id: 6
                'name' => 'Squads',
                'route' => '/squads',
                'icon' => 'groups',
                'parent_id' => 5,
                'order' => 1,
                'status' => 1,
                'exclusive_dev' => 0
            ],
            [
                //id: 7
                'name' => 'Colaboradores',
                'route' => '/employees',
                'icon' => 'badge',
                'parent_id' => 5,
                'order' => 1,
                'status' => 1,
                'exclusive_dev' => 0
            ],
             [
                //id: 8
                'name' => 'Scrum',
                'route' => null,
                'icon' => 'view_kanban',
                'parent_id' => null,
                'order' => 2,
                'status' => 1,
                'exclusive_dev' => 0
            ],
            [
                //id: 9
                'name' => 'Sprints e Projetos',
                'route' => '/sprints-projects',
                'icon' => 'assignment',
                'parent_id' => 8,
                'order' => 1,
                'status' => 1,
                'exclusive_dev' => 0
            ],
            [
                //id: 9
                'name' => 'Métricas',
                'route' => '/metrics',
                'icon' => 'bar_chart',
                'parent_id' => 8,
                'order' => 1,
                'status' => 1,
                'exclusive_dev' => 0
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
