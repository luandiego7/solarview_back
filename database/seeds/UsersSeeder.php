<?php

use Illuminate\Database\Seeder;
use App\Models\User\User;
use \Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['id' => 1],
            [
                'city_id'           => 2163,
                'superadmin'        => 1,
                'profile'           => 0,
                'name'              => 'Luan Admin',
                'email'             => 'luan@codintop.com',
                'genre'             => 1,
                'birthday'          => '1989-02-14',
                'contact'           => '(71)99123-7296',
                'cep'               => '41760-035',
                'address'           => 'Rua Doutor Augusto Lopes Pontes',
                'neighborhood'      => 'Costa Azul',
                'complement'        => 'Costa do Atlântico',
                'number'            => '455',
                'course'            => 'Sitemas de Informação',
                'institution'       => 'Unifacs',
                'profession'        => 'Desenvolvedor Pleno',
                'photo'             => null,
                'password'          => Hash::make('andies89'),
                'description'       => 'Superadmin de desenvolvimento Codintop',
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
    }
}
