<?php

use Illuminate\Database\Seeder;
use App\Models\Management\RoleGroup;

class RolesGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleGroup::updateOrCreate(['id' => 1], [
            'name'       => 'Home',
            'icon'       => 'fas fa-home',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        RoleGroup::updateOrCreate(['id' => 2], [
            'name'       => 'Perfil',
            'icon'       => 'fas fa-star',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        RoleGroup::updateOrCreate(['id' => 3], [
            'name'       => 'Usuários',
            'icon'       => 'fas fa-users',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        RoleGroup::updateOrCreate(['id' => 4], [
            'name'       => 'Funções',
            'icon'       => 'fas fa-shield-alt',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        RoleGroup::updateOrCreate(['id' => 5], [
            'name'       => 'Outros',
            'icon'       => 'fas fa-code-branch',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
