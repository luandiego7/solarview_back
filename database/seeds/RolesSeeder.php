<?php

use Illuminate\Database\Seeder;
use App\Models\Management\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(['id' => 1],
            [
                'company_id' => null,
                'name'       => 'Permissões Comuns'
            ]
        );
        Role::updateOrCreate(['id' => 2],
            [
                'company_id' => null,
                'name'       => 'Cliente'
            ]
        );
    }
}
