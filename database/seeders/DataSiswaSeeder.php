<?php

namespace Database\Seeders;

use App\Models\DataSiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->has(DataSiswa::factory())->create();
        $user->assignRole('user');
    }
}
