<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::updateOrCreate(['id' => 1],
            [
                'uf'                => 'AC',
                'name'              => 'Acre',
                'ibge'              => '12',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 2],
            [
                'uf'                => 'AL',
                'name'              => 'Alagoas',
                'ibge'              => '27',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 3],
            [
                'uf'                => 'AP',
                'name'              => 'Amapá',
                'ibge'              => '16',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 4],
            [
                'uf'                => 'AM',
                'name'              => 'Amazonas',
                'ibge'              => '13',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 5],
            [
                'uf'                => 'BA',
                'name'              => 'Bahia',
                'ibge'              => '29',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 6],
            [
                'uf'                => 'CE',
                'name'              => 'Ceará',
                'ibge'              => '23',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 7],
            [
                'uf'                => 'DF',
                'name'              => 'Distrito Federal',
                'ibge'              => '53',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 8],
            [
                'uf'                => 'ES',
                'name'              => 'Espírito Santo',
                'ibge'              => '32',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 9],
            [
                'uf'                => 'GO',
                'name'              => 'Goiás',
                'ibge'              => '52',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 10],
            [
                'uf'                => 'MA',
                'name'              => 'Maranhão',
                'ibge'              => '21',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 11],
            [
                'uf'                => 'MT',
                'name'              => 'Mato Grosso',
                'ibge'              => '51',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 12],
            [
                'uf'                => 'MS',
                'name'              => 'Mato Grosso do Sul',
                'ibge'              => '50',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 13],
            [
                'uf'                => 'MG',
                'name'              => 'Minas Gerais',
                'ibge'              => '31',
                'aliq_icms_interna' => '18.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 14],
            [
                'uf'                => 'PA',
                'name'              => 'Pará',
                'ibge'              => '15',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 15],
            [
                'uf'                => 'PB',
                'name'              => 'Paraíba',
                'ibge'              => '25',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 16],
            [
                'uf'                => 'PR',
                'name'              => 'Paraná',
                'ibge'              => '41',
                'aliq_icms_interna' => '18.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 17],
            [
                'uf'                => 'PE',
                'name'              => 'Pernambuco',
                'ibge'              => '26',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 18],
            [
                'uf'                => 'PI',
                'name'              => 'Piauí',
                'ibge'              => '22',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 19],
            [
                'uf'                => 'RR',
                'name'              => 'Roraima',
                'ibge'              => '14',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 20],
            [
                'uf'                => 'RO',
                'name'              => 'Rondônia',
                'ibge'              => '11',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 21],
            [
                'uf'                => 'RJ',
                'name'              => 'Rio de Janeiro',
                'ibge'              => '33',
                'aliq_icms_interna' => '19.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 22],
            [
                'uf'                => 'RN',
                'name'              => 'Rio Grande do Norte',
                'ibge'              => '24',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 23],
            [
                'uf'                => 'RS',
                'name'              => 'Rio Grande do Sul',
                'ibge'              => '43',
                'aliq_icms_interna' => '18.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 24],
            [
                'uf'                => 'SC',
                'name'              => 'Santa Catarina',
                'ibge'              => '42',
                'aliq_icms_interna' => '18.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 25],
            [
                'uf'                => 'SP',
                'name'              => 'São Paulo',
                'ibge'              => '35',
                'aliq_icms_interna' => '18.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 26],
            [
                'uf'                => 'SE',
                'name'              => 'Sergipe',
                'ibge'              => '28',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        State::updateOrCreate(['id' => 27],
            [
                'uf'                => 'TO',
                'name'              => 'Tocantins',
                'ibge'              => '17',
                'aliq_icms_interna' => '17.00',
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
    }
}
