<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = [
            [
                'nama_level' => "admin",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama_level' => "upt",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama_level' => "petani",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];

        // Level::create($level);
        DB::table('level')->insert($level);
    }
}
