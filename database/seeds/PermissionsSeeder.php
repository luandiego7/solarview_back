<?php

use Illuminate\Database\Seeder;
use \App\Models\Management\Permission;
use \App\Models\Management\RoleGroup;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        Permission::updateOrCreate(['id' => 1],
            [
                'role_group_id'   => RoleGroup::GROUP_HOME,
                'name'       => 'Home/Página Inicial',
                'route'      => 'home',
                'description'=> 'Visualizar a página inicial',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 2],
            [
                'role_group_id'   => RoleGroup::GROUP_HOME,
                'name'       => 'Dashboard',
                'route'      => 'home.dashboard',
                'description'=> 'Visualizar o dashboard da página inicial.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 3],
            [
                'role_group_id'   => RoleGroup::GROUP_PROFILE,
                'name'       => 'Perfil',
                'route'      => 'profile',
                'description'=> 'Visualizar a página do perfil.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 4],
            [
                'role_group_id'   => RoleGroup::GROUP_PROFILE,
                'name'       => 'Check Parâmetros',
                'route'      => 'profile.check.params',
                'description'=> 'Comparar se valores e parâmetros estão corretos e disponíveis para uso.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 5],
            [
                'role_group_id'   => RoleGroup::GROUP_PROFILE,
                'name'       => 'Salvar',
                'route'      => 'profile.save',
                'description'=> 'Salvar os dados do perfil.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 6],
            [
                'role_group_id'   => RoleGroup::GROUP_PROFILE,
                'name'       => 'Check senha',
                'route'      => 'profile.check.password',
                'description'=> 'Verificar própria senha.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 7],
            [
                'role_group_id'   => RoleGroup::GROUP_PROFILE,
                'name'       => 'Alterar senha',
                'route'      => 'profile.change.password',
                'description'=> 'Alterar a senha da própria conta.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 8],
            [
                'role_group_id'   => RoleGroup::GROUP_PROFILE,
                'name'       => 'E-mail Suporte',
                'route'      => 'profile.email.support',
                'description'=> 'Enviar e-mail para o suporte.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 9],
            [
                'role_group_id'   => RoleGroup::GROUP_USERS,
                'name'       => 'Lista',
                'route'      => 'usuario.index',
                'description'=> 'Visualizar a página de listagem dos usuários cadastrados.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 10],
            [
                'role_group_id'   => RoleGroup::GROUP_USERS,
                'name'       => 'Criar',
                'route'      => 'usuario.create',
                'description'=> 'Criar um novo usuário.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 11],
            [
                'role_group_id'   => RoleGroup::GROUP_USERS,
                'name'       => 'Editar',
                'route'      => 'usuario.edit',
                'description'=> 'Editar um usuário cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 12],
            [
                'role_group_id'   => RoleGroup::GROUP_USERS,
                'name'       => 'Salvar',
                'route'      => 'usuario.save',
                'description'=> 'Salvar os dados de um usuário.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 13],
            [
                'role_group_id'   => RoleGroup::GROUP_USERS,
                'name'       => 'Check Parâmetros',
                'route'      => 'usuario.check.parametro',
                'description'=> 'Comparar se valores e parâmetros estão corretos e disponíveis para uso.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 14],
            [
                'role_group_id'   => RoleGroup::GROUP_USERS,
                'name'       => 'Deletar',
                'route'      => 'usuario.delete',
                'description'=> 'Deletar um usuário cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 15],
            [
                'role_group_id'   => RoleGroup::GROUP_USERS,
                'name'       => 'Visualizar',
                'route'      => 'usuario.view',
                'description'=> 'Visualizar os dados de um usuário cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 16],
            [
                'role_group_id'   => RoleGroup::GROUP_USERS,
                'name'       => 'Dados',
                'route'      => 'usuario.get',
                'description'=> 'Pesquisar os dados de um usuário cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Permission::updateOrCreate(['id' => 17],
            [
                'role_group_id'   => RoleGroup::GROUP_USERS,
                'name'       => 'Foto',
                'route'      => 'usuario.get.foto',
                'description'=> 'Pesquisar a foto de um usuário cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        Permission::updateOrCreate(['id' => 18],
            [
                'role_group_id'   => RoleGroup::GROUP_ROLES,
                'name'       => 'Lista',
                'route'      => 'funcao.index',
                'description'=> 'Visualizar a página de listagem das funções cadastradas.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 19],
            [
                'role_group_id'   => RoleGroup::GROUP_ROLES,
                'name'       => 'Criar',
                'route'      => 'funcao.create',
                'description'=> 'Criar uma nova função.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 20],
            [
                'role_group_id'   => RoleGroup::GROUP_ROLES,
                'name'       => 'Editar',
                'route'      => 'funcao.edit',
                'description'=> 'Editar uma função cadastrada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 21],
            [
                'role_group_id'   => RoleGroup::GROUP_ROLES,
                'name'       => 'Salvar',
                'route'      => 'funcao.save',
                'description'=> 'Salvar os dados de uma função.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 22],
            [
                'role_group_id'   => RoleGroup::GROUP_ROLES,
                'name'       => 'Deletar',
                'route'      => 'funcao.delete',
                'description'=> 'Deletar uma função cadastrada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 23],
            [
                'role_group_id'   => RoleGroup::GROUP_ROLES,
                'name'       => 'Check Parãmetros',
                'route'      => 'funcao.check.parametro',
                'description'=> 'Comparar se valores e parâmetros estão corretos e disponíveis para uso.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 24],
            [
                'role_group_id'   => RoleGroup::GROUP_ROLES,
                'name'       => 'Permissões',
                'route'      => 'funcao.permissoes',
                'description'=> 'Permissões para visualizar a página de permissões de uma função.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 25],
            [
                'role_group_id'   => RoleGroup::GROUP_ROLES,
                'name'       => 'Salvar Permissões',
                'route'      => 'funcao.save.permissoes',
                'description'=> 'Salvar as permissões de uma função.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 26],
            [
                'role_group_id'   => RoleGroup::GROUP_OTHERS,
                'name'       => 'Endereço pelo CEP',
                'route'      => 'get.endereco.cep',
                'description'=> 'Pesquisar endereços através do CEP.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 27],
            [
                'role_group_id'   => RoleGroup::GROUP_OTHERS,
                'name'       => 'Cidades UF',
                'route'      => 'get.cidade.uf',
                'description'=> 'Pesquisar as cidades de um estado/uf.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
