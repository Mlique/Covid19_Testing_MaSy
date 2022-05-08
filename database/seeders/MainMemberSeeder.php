<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_members')->insert([
            'id' => '1',
            'main_member_id' => '2',
            'first_name' => 'Charmaine',
            'last_name' => 'Meintjies',
            'email_address' => 'charmaine@gmail.com',
            'contact_number' => '0832458796',
            'id_number' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'medical_aid_YN' => 'Yes',
            'medical_plan_id' => '8',
            'medical_aid_no' => '285465885'
        ]);
         DB::table('main_members')->insert([
            'id' => '2',
            'main_member_id' => '3',
            'first_name' => 'Jacob',
            'last_name' => 'Moloi',
            'email_address' => 'jacob@gmail.com',
            'contact_number' => '0822458796',
            'id_number' => '8012010225083',
            'addressLine1' => '24 7th Avenue',
            'suburb_id' => '127',
            'medical_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '3',
            'main_member_id' => '4',
            'first_name' => 'David',
            'last_name' => 'Greeff',
            'email_address' => 'davide@gmail.com',
            'contact_number' => '0712458796',
            'id_number' => '8002200225083',
            'addressLine1' => '1 Harbor Cottages',
            'addressLine2' => 'Sayre Crescent',
            'suburb_id' => '56',
            'medical_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '4',
            'main_member_id' => '5',
            'first_name' => 'Kopano',
            'last_name' => 'Sithole',
            'email_address' => 'kopano@gmail.com',
            'contact_number' => '0722458796',
            'id_number' => '7606030225083',
            'addressLine1' => '27 Aspen Complex',
            'addressLine2' => 'La Roche Drive',
            'suburb_id' => '57',
            'medical_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '5',
            'main_member_id' => '6',
            'first_name' => 'Karien',
            'last_name' => 'Momberg',
            'email_address' => 'karien@gmail.com',
            'contact_number' => '0732458796',
            'id_number' => '8509020225083',
            'addressLine1' => '6 Rubin Crescent',
            'suburb_id' => '126',
            'medical_aid_YN' => 'No',
        ]);
        DB::table('main_members')->insert([
            'id' => '6',
            'main_member_id' => '7',
            'first_name' => 'Felicity',
            'last_name' => 'Daniels',
            'email_address' => 'felicityONP400@gmail.com',
            'contact_number' => '0732458796',
            'id_number' => '7512020225083',
            'addressLine1' => '28 7th Avenue',
            'suburb_id' => '127',
            'medical_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '7',
            'main_member_id' => '8',
            'first_name' => 'Errol ',
            'last_name' => 'Pieterse',
            'email_address' => 'errol@gmail.com',
            'contact_number' => '0612458796',
            'id_number' => '6008090225083',
            'addressLine1' => '37 The Beaches',
            'addressLine2' => 'Beach Road',
            'suburb_id' => '56',
            'medical_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '8',
            'main_member_id' => '9',
            'first_name' => 'Alyce',
            'last_name' => 'Morapedi',
            'email_address' => 'alyce@gmail.com',
            'contact_number' => '0632458796',
            'id_number' => '6412120225083',
            'addressLine1' => '12 Marshall Road',
            'suburb_id' => '57',
            'medical_aid_YN' => 'Yes',
            'medical_plan_id' => '17',
            'medical_aid_no' => '395465885'
        ]);
         DB::table('main_members')->insert([
            'id' => '9',
            'main_member_id' => '10',
            'first_name' => 'Asha',
            'last_name' => 'Sharma',
            'email_address' => 'asha@gmail.com',
            'contact_number' => '0812458796',
            'id_number' => '8302090225083',
            'addressLine1' => '13 Congo Avenue',
            'suburb_id' => '84',
            'medical_aid_YN' => 'Yes',
            'medical_plan_id' => '44',
            'medical_aid_no' => '175465885'
        ]);
         DB::table('main_members')->insert([
            'id' => '10',
            'main_member_id' => '11',
            'first_name' => 'Carlos',
            'last_name' => 'Perestrelo',
            'email_address' => 'carlos@gmail.com',
            'contact_number' => '0842458796',
            'id_number' => '5008100225083',
            'addressLine1' => '29 Peace Street',
            'suburb_id' => '84',
            'medical_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '11',
            'main_member_id' => '12',
            'first_name' => 'Kabelo',
            'last_name' => 'Padi',
            'email_address' => 'kabelo@gmail.com',
            'contact_number' => '0742458796',
            'id_number' => '7112150225083',
            'addressLine1' => '7 Jacks Road',
            'suburb_id' => '84',
            'medical_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '12',
            'main_member_id' => '13',
            'first_name' => 'Pulane',
            'last_name' => 'Masemola',
            'email_address' => 'pulane@gmail.com',
            'contact_number' => '0642458796',
            'id_number' => '9110120225083',
            'addressLine1' => '45 Columbia Crescent',
            'suburb_id' => '84',
            'medical_aid_YN' => 'Yes',
            'medical_plan_id' => '1',
            'medical_aid_no' => '465465885'
        ]);
    }
}
