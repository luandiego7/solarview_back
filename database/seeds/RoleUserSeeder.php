<?php

use Illuminate\Database\Seeder;
use App\Models\Management\RoleUser;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleUser::updateOrCreate(['id' => 1],
            [
                'role_id' => 1,
                'user_id' => 1
            ]
        );
    }
}
