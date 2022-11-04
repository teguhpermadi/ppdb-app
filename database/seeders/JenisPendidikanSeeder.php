<?php

namespace Database\Seeders;

use App\Models\JenisPendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPendidikan::insert([
            ['name' => 'Tidak sekolah'],
            ['name' => 'SD sederajat'],
            ['name' => 'SMP sederajat'],
            ['name' => 'SMA sederajat'],
            ['name' => 'Diploma'],
            ['name' => 'Srata 1'],
            ['name' => 'Srata 2'],
            ['name' => 'Srata 3'],
        ]);
    }
}
