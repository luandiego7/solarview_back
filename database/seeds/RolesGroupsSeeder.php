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
        RoleGroup::updateOrCreate(['id' => 6], [
            'name'       => 'Clientes',
            'icon'       => 'fas fa-users',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        RoleGroup::updateOrCreate(['id' => 7], [
            'name'       => 'Unidades',
            'icon'       => 'fas fa-building',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        RoleGroup::updateOrCreate(['id' => 8], [
            'name'       => 'Ambientes',
            'icon'       => 'fas fa-couch',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        RoleGroup::updateOrCreate(['id' => 9], [
            'name'       => 'Equipamentos',
            'icon'       => 'fas fa-fire-extinguisher',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        RoleGroup::updateOrCreate(['id' => 10], [
            'name'       => 'Cargos',
            'icon'       => 'fas fa-people-carry',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        RoleGroup::updateOrCreate(['id' => 11], [
            'name'       => 'Colaboradores',
            'icon'       => 'fas fa-user-md',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        RoleGroup::updateOrCreate(['id' => 12], [
            'name'       => 'Manutenção',
            'icon'       => 'fas fa-wrench',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
