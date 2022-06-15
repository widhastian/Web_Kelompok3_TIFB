<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desa = [
            [
                'nama_desa' => "Alasnyiur",
                'id_kecamatan' => '1',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama_desa' => "Kecik",
                'id_kecamatan' => '1',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama_desa' => "Bago",
                'id_kecamatan' => '1',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama_desa' => "Pandean",
                'id_kecamatan' => '3',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];

        // Desa::create($desa);

        DB::table('desa')->insert($desa);
    }
}
