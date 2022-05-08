<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lab_users')->insert([
            'labUser_id' => '17',
            'first_name' => 'Mandla',
            'last_name' => 'Khumalo',
            'email_address' => 'mandla@gmail.com',
            'contact_number' => '0912458796',
            'id_number' => '79052520225083',
        ]);
    }
}
