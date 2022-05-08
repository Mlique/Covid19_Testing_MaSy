<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DependentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dependents')->insert([
            'id' => '91',
            'main_member_id' => '2',
            'first_name' => 'Daleen',
            'last_name' => 'Meintjies',
            'email_address' => 'daleen@gmail.com',
            'contact_number' => '0832458796',
            'id_number' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'medical_aid' => 'Yes',
            'medical_plan_id' => '8',
            'medical_aid_no' => '285465885',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('dependents')->insert([
            'id' => '92',
            'main_member_id' => '2',
            'first_name' => 'Vince',
            'last_name' => 'Meintjies',
            'email_address' => 'charmaine@gmail.com',
            'contact_number' => '0832458796',
            'id_number' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'medical_aid' => 'Yes',
            'medical_plan_id' => '8',
            'medical_aid_no' => '285465885',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('dependents')->insert([
            'id' => '93',
            'main_member_id' => '2',
            'first_name' => 'Vanessa',
            'last_name' => 'Meintjies',
            'email_address' => 'charmaine@gmail.com',
            'contact_number' => '0832458796',
            'id_number' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'medical_aid' => 'Yes',
            'medical_plan_id' => '8',
            'medical_aid_no' => '285465885',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('dependents')->insert([
            'id' => '94',
            'main_member_id' => '2',
            'first_name' => 'Daniel',
            'last_name' => 'Meintjies',
            'email_address' => 'charmaine@gmail.com',
            'contact_number' => '0832458796',
            'id_number' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'medical_aid' => 'Yes',
            'medical_plan_id' => '8',
            'medical_aid_no' => '285465885',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('dependents')->insert([
            'id' => '95',
            'main_member_id' => '3',
            'first_name' => 'Lesedi',
            'last_name' => 'Moloi',
            'email_address' => 'lesedi@gmail.com',
            'contact_number' => '0772458796',
            'id_number' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'medical_aid' => 'Yes',
            'medical_plan_id' => '8',
            'medical_aid_no' => '285465885',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('dependents')->insert([
            'id' => '96',
            'main_member_id' => '3',
            'first_name' => 'Thabo',
            'last_name' => 'Moloi',
            'email_address' => 'jacob@gmail.com',
            'contact_number' => '0822458796',
            'id_number' => '8012010225083',
            'addressLine1' => '24 7th Avenue',
            'suburb_id' => '127',
            'medical_aid' => 'No',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
