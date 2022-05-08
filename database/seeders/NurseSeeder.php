<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nurses')->insert([
            'id' => '1',
            'nurse_id' => '14',
            'first_name' => 'Dorothy',
            'last_name' => 'Daniels',
            'email_address' => 'dorothy@gmail.com',
            'contact_number' => '0512458796',
            'id_number' => '7503180225083',
            'suburb_id' => '126',
        ]);
         DB::table('nurses')->insert([
            'id' => '2',
            'nurse_id' => '15',
            'first_name' => 'Lindile',
            'last_name' => 'Hadebe',
            'email_address' => 'lindile@gmail.com',
            'contact_number' => '0522458796',
            'id_number' => '7603180225083',
            'suburb_id' => '73',
        ]);
         DB::table('nurses')->insert([
            'id' => '3',
            'nurse_id' => '16',
            'first_name' => 'Marcel',
            'last_name' => 'Van Niekerk',
            'email_address' => 'marcel@gmail.com',
            'contact_number' => '0532458796',
            'id_number' => '7703180225083',
            'suburb_id' => '43',
        ]);
    }
}
