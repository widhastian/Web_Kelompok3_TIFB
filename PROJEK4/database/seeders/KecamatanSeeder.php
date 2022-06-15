<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatan = [
            [
                'nama_kecamatan' => "Besuk",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama_kecamatan' => "Pakuniran",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama_kecamatan' => "Paiton",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];

        // Kecamatan::create($kecamatan);
        DB::table('kecamatan')->insert($kecamatan);
    }
}
