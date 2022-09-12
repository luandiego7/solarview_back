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
        Permission::updateOrCreate(['id' => 28],
            [
                'role_group_id'   => RoleGroup::GROUP_CLIENTS,
                'name'       => 'Lista',
                'route'      => 'cliente.index',
                'description'=> 'Visualizar a página de listagem dos clientes cadastrados.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 29],
            [
                'role_group_id'   => RoleGroup::GROUP_CLIENTS,
                'name'       => 'Criar',
                'route'      => 'cliente.create',
                'description'=> 'Criar um novo cliente.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 30],
            [
                'role_group_id'   => RoleGroup::GROUP_CLIENTS,
                'name'       => 'Check Parâmetros',
                'route'      => 'cliente.check.parametro',
                'description'=> 'Comparar se valores e parâmetros estão corretos e disponíveis para uso.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 31],
            [
                'role_group_id'   => RoleGroup::GROUP_CLIENTS,
                'name'       => 'Salvar',
                'route'      => 'cliente.save.ajax',
                'description'=> 'Salvar os dados de um cliente.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 32],
            [
                'role_group_id'   => RoleGroup::GROUP_CLIENTS,
                'name'       => 'Editar',
                'route'      => 'cliente.edit',
                'description'=> 'Editar um cliente cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 33],
            [
                'role_group_id'   => RoleGroup::GROUP_CLIENTS,
                'name'       => 'Visualizar',
                'route'      => 'cliente.view',
                'description'=> 'Visualizar os dados de um cliente cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 34],
            [
                'role_group_id'   => RoleGroup::GROUP_CLIENTS,
                'name'       => 'Dados',
                'route'      => 'cliente.get',
                'description'=> 'Pesquisar os dados de um cliente cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 35],
            [
                'role_group_id'   => RoleGroup::GROUP_CLIENTS,
                'name'       => 'Verificar',
                'route'      => 'cliente.verificar',
                'description'=> 'Verificar se um cliente está vinculado à empresa.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 36],
            [
                'role_group_id'   => RoleGroup::GROUP_CLIENTS,
                'name'       => 'Solicitar',
                'route'      => 'cliente.solicitar',
                'description'=> 'Solicitar a um cliente cadastrado um vínculo com a empresa.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 37],
            [
                'role_group_id'   => RoleGroup::GROUP_OFFICES,
                'name'       => 'Lista',
                'route'      => 'unidade.index',
                'description'=> 'Visualizar a página de listagem das unidades cadastradas.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 38],
            [
                'role_group_id'   => RoleGroup::GROUP_OFFICES,
                'name'       => 'Criar',
                'route'      => 'unidade.create',
                'description'=> 'Criar uma nova unidade.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 39],
            [
                'role_group_id'   => RoleGroup::GROUP_OFFICES,
                'name'       => 'Editar',
                'route'      => 'unidade.edit',
                'description'=> 'Editar uma unidade cadastrada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 40],
            [
                'role_group_id'   => RoleGroup::GROUP_OFFICES,
                'name'       => 'Visualizar',
                'route'      => 'unidade.view',
                'description'=> 'Visualizar os dados de uma unidade cadastrada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 41],
            [
                'role_group_id'   => RoleGroup::GROUP_OFFICES,
                'name'       => 'Dados',
                'route'      => 'unidade.get',
                'description'=> 'Pesquisar os dados de uma unidade cadastrada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 42],
            [
                'role_group_id'   => RoleGroup::GROUP_OFFICES,
                'name'       => 'Deletar',
                'route'      => 'unidade.delete',
                'description'=> 'Deletar uma unidade cadastrada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 43],
            [
                'role_group_id'   => RoleGroup::GROUP_OFFICES,
                'name'       => 'Salvar',
                'route'      => 'unidade.save',
                'description'=> 'Salvar os dados de uma unidade.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 44],
            [
                'role_group_id'   => RoleGroup::GROUP_OFFICES,
                'name'       => 'Salvar Personalizado',
                'route'      => 'unidade.save.ajax',
                'description'=> 'Salvar os dados de uma unidade em outras partes do sistema.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 45],
            [
                'role_group_id'   => RoleGroup::GROUP_OFFICES,
                'name'       => 'Unidades do Client',
                'route'      => 'unidade.get.unidades.cliente',
                'description'=> 'Pesquisar as unidades cadastradas de um cliente.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 46],
            [
                'role_group_id'   => RoleGroup::GROUP_AMBIENCES,
                'name'       => 'Lista',
                'route'      => 'ambiente.index',
                'description'=> 'Visualizar a página de listagem dos ambientes cadastrados.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 47],
            [
                'role_group_id'   => RoleGroup::GROUP_AMBIENCES,
                'name'       => 'Criar',
                'route'      => 'ambiente.create',
                'description'=> 'Criar um novo ambiente.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 48],
            [
                'role_group_id'   => RoleGroup::GROUP_AMBIENCES,
                'name'       => 'Editar',
                'route'      => 'ambiente.edit',
                'description'=> 'Editar um ambiente cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 49],
            [
                'role_group_id'   => RoleGroup::GROUP_AMBIENCES,
                'name'       => 'Visualizar',
                'route'      => 'ambiente.view',
                'description'=> 'Visualizar os dados de um ambiente cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 50],
            [
                'role_group_id'   => RoleGroup::GROUP_AMBIENCES,
                'name'       => 'Dados',
                'route'      => 'ambiente.get',
                'description'=> 'Pesquisar os dados de um ambiente cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 51],
            [
                'role_group_id'   => RoleGroup::GROUP_AMBIENCES,
                'name'       => 'Deletar',
                'route'      => 'ambiente.delete',
                'description'=> 'Deletar um ambiente cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 52],
            [
                'role_group_id'   => RoleGroup::GROUP_AMBIENCES,
                'name'       => 'Salvar',
                'route'      => 'ambiente.save',
                'description'=> 'Salvar os dados de um ambiente.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 53],
            [
                'role_group_id'   => RoleGroup::GROUP_AMBIENCES,
                'name'       => 'Salvar Personalizado',
                'route'      => 'ambiente.save.ajax',
                'description'=> 'Salvar os dados de um ambiente em outras partes do sistema.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 54],
            [
                'role_group_id'   => RoleGroup::GROUP_AMBIENCES,
                'name'       => 'Ambientes de uma Office',
                'route'      => 'ambiente.get.ambientes.unidade',
                'description'=> 'Pesquisar os ambientes cadastrados de uma Office.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 55],
            [
                'role_group_id'   => RoleGroup::GROUP_EQUIPMENTS,
                'name'       => 'Lista',
                'route'      => 'equipamento.index',
                'description'=> 'Visualizar a página de listagem dos equipamentos cadastrados.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 56],
            [
                'role_group_id'   => RoleGroup::GROUP_EQUIPMENTS,
                'name'       => 'Criar',
                'route'      => 'equipamento.create',
                'description'=> 'Criar um novo equipamento.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 57],
            [
                'role_group_id'   => RoleGroup::GROUP_EQUIPMENTS,
                'name'       => 'Editar',
                'route'      => 'equipamento.edit',
                'description'=> 'Editar um equipamento cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 58],
            [
                'role_group_id'   => RoleGroup::GROUP_EQUIPMENTS,
                'name'       => 'Visualizar',
                'route'      => 'equipamento.view',
                'description'=> 'Visualizar os dados de um equipamento cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 59],
            [
                'role_group_id'   => RoleGroup::GROUP_EQUIPMENTS,
                'name'       => 'Dados',
                'route'      => 'equipamento.get',
                'description'=> 'Pesquisar os dados de um equipamento cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 60],
            [
                'role_group_id'   => RoleGroup::GROUP_EQUIPMENTS,
                'name'       => 'Deletar',
                'route'      => 'equipamento.delete',
                'description'=> 'Deletar um equipamento cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 61],
            [
                'role_group_id'   => RoleGroup::GROUP_EQUIPMENTS,
                'name'       => 'Salvar',
                'route'      => 'equipamento.save',
                'description'=> 'Salvar os dados de um equipamento.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 62],
            [
                'role_group_id'   => RoleGroup::GROUP_EQUIPMENTS,
                'name'       => 'Salvar Personalizado',
                'route'      => 'equipamento.save.ajax',
                'description'=> 'Salvar os dados de um equipamento em outras partes do sistema.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 63],
            [
                'role_group_id'   => RoleGroup::GROUP_EQUIPMENTS,
                'name'       => 'Equipamentos do Ambience',
                'route'      => 'equipamento.get.equipamentos.ambiente',
                'description'=> 'Pesquisar os equipamentos cadastrados de um ambiente.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 64],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEE_ROLES,
                'name'       => 'Lista',
                'route'      => 'cargo.index',
                'description'=> 'Visualizar a página de listagem dos cargos cadastrados.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 65],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEE_ROLES,
                'name'       => 'Criar',
                'route'      => 'cargo.create',
                'description'=> 'Criar um novo cargo.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 66],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEE_ROLES,
                'name'       => 'Pesquisar CBO',
                'route'      => 'cargo.get.cbo',
                'description'=> "Permissão pesquisar os CBO's para um determiado cargo.",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 67],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEE_ROLES,
                'name'       => 'Editar',
                'route'      => 'cargo.edit',
                'description'=> 'Editar um cargo cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 68],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEE_ROLES,
                'name'       => 'Dados',
                'route'      => 'cargo.get',
                'description'=> 'Pesquisar os dados de um cargo cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 69],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEE_ROLES,
                'name'       => 'Visualizar',
                'route'      => 'cargo.view',
                'description'=> 'Visualizar os dados de um cargo cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 70],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEE_ROLES,
                'name'       => 'Deletar',
                'route'      => 'cargo.delete',
                'description'=> 'Deletar um cargo cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 71],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEE_ROLES,
                'name'       => 'Salvar',
                'route'      => 'cargo.save',
                'description'=> 'Salvar os dados de um cargo.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 72],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEE_ROLES,
                'name'       => 'Pesquisar Cargos',
                'route'      => 'cargo.get.cargos.empresa',
                'description'=> 'Pesquisar os cargos cadastrados.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 73],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEES,
                'name'       => 'Lista',
                'route'      => 'colaborador.index',
                'description'=> 'Visualizar a página de listagem dos colaboradores cadastrados.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 74],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEES,
                'name'       => 'Criar',
                'route'      => 'colaborador.create',
                'description'=> 'Criar um novo colaborador.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 75],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEES,
                'name'       => 'Editar',
                'route'      => 'colaborador.edit',
                'description'=> 'Editar um colaborador cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 76],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEES,
                'name'       => 'Visualizar',
                'route'      => 'colaborador.view',
                'description'=> 'Visualizar os dados de um colaborador cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 77],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEES,
                'name'       => 'Dados',
                'route'      => 'colaborador.get',
                'description'=> 'Pesquisar os dados de um colaborador cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 78],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEES,
                'name'       => 'Deletar',
                'route'      => 'colaborador.delete',
                'description'=> 'Deletar um colaborador cadastrado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 79],
            [
                'role_group_id'   => RoleGroup::GROUP_EMPLOYEES,
                'name'       => 'Salvar',
                'route'      => 'colaborador.save',
                'description'=> 'Salvar os dados de um colaborador.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 80],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Dados',
                'route'      => 'manutencao.get',
                'description'=> 'Pesquisar os dados de uma  manutenção cadastrada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 81],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Check Horário Técnico',
                'route'      => 'manutencao.check.horario.tecnico',
                'description'=> 'Checkar se o técnico está disponível em uma determinada data/horário',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 82],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Cancelar',
                'route'      => 'manutencao.cancelar',
                'description'=> 'Cancelar uma manutenção que ainda não foi finalizada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 83],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Reabrir',
                'route'      => 'manutencao.reabrir',
                'description'=> 'Reabrir uma manutenção que está cancelada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 84],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'executar',
                'route'      => 'manutencao.executar',
                'description'=> 'Executar uma manutenção agendada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 85],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'finalizar',
                'route'      => 'manutencao.finalizar',
                'description'=> 'Finalizar uma manutenção que está em execução.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 86],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Lista',
                'route'      => 'manutencao.chamados',
                'description'=> 'Visualizar a página de listagem dos chamados cadastrados.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 87],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Abrir Chamado',
                'route'      => 'Manutencao.abrir.chamado',
                'description'=> 'Abrir um novo chamado.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 88],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Editar',
                'route'      => 'manutencao.edit',
                'description'=> 'Editar uma manutenção agendada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 89],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Salvar',
                'route'      => 'manutencao.save',
                'description'=> 'Salvar os dados de uma manutenção agendada.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 90],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Visualizar',
                'route'      => 'manutencao.view',
                'description'=> 'Visualizar os dados de uma manutenção.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 91],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Agenda',
                'route'      => 'manutencao.agenda',
                'description'=> 'Visualizar a página da agenda/calendário.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Permission::updateOrCreate(['id' => 92],
            [
                'role_group_id'   => RoleGroup::GROUP_MAINTENANCE,
                'name'       => 'Adicionar Atividades',
                'route'      => 'manutencao.add.atividade',
                'description'=> 'Adicionar atividades em uma manutenção.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
