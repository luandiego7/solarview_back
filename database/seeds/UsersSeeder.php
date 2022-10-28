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
                'name'              => 'Luan Araujo',
                'email'             => 'luandiego7@gmail.com',
                'genre'             => 1,
                'password'          => Hash::make('solarview'),
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
    }
}
