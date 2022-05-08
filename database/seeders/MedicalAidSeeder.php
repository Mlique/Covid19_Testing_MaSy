<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalAidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_aids')->insert([
            'aid_name' => 'BestMed'
        ]);
        DB::table('medical_aids')->insert([
            'aid_name' => 'Bonitas'
        ]);
        DB::table('medical_aids')->insert([
            'aid_name' => 'Discovery Health'
        ]);
    }
}
