<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_results')->insert([
            'id' => '1',
            'testRequest_id' => '16',
            'patient_id' => '2',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Positive',
            'temperature' => '37.5',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '95',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '2',
            'testRequest_id' => '17',
            'patient_id' => '91',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Positive',
            'temperature' => '38.2',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '97',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '3',
            'testRequest_id' => '18',
            'patient_id' => '92',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Negative',
            'temperature' => '34.6',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '99',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '4',
            'testRequest_id' => '19',
            'patient_id' => '93',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Negative',
            'temperature' => '35.8',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '99',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '5',
            'testRequest_id' => '20',
            'patient_id' => '94',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Positive',
            'temperature' => '37.9',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '90',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '6',
            'testRequest_id' => '21',
            'patient_id' => '4',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Negative',
            'temperature' => '35.1',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '100',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '7',
            'testRequest_id' => '22',
            'patient_id' => '5',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Positive',
            'temperature' => '36.9',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '92',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '8',
            'testRequest_id' => '23',
            'patient_id' => '6',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Positive',
            'temperature' => '37.4',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '91',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '9',
            'testRequest_id' => '24',
            'patient_id' => '7',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Positive',
            'temperature' => '38.1',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '93',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '10',
            'testRequest_id' => '25',
            'patient_id' => '8',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Negative',
            'temperature' => '34.5',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '100',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '11',
            'testRequest_id' => '26',
            'patient_id' => '9',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Positive',
            'temperature' => '37.2',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '91',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '12',
            'testRequest_id' => '27',
            'patient_id' => '10',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Negative',
            'temperature' => '34.2',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '99',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '13',
            'testRequest_id' => '28',
            'patient_id' => '11',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Positive',
            'temperature' => '38.2',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '92',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '14',
            'testRequest_id' => '29',
            'patient_id' => '12',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Positive',
            'temperature' => '37.9',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '93',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '15',
            'testRequest_id' => '30',
            'patient_id' => '13',
            'labUser_id' => '17',
            'barcode' => '12345678',
            'test_result_PN' => 'Positive',
            'temperature' => '38.5',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '94',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
