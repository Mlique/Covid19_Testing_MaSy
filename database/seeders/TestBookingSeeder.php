<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_bookings')->insert([
            'id' => '1',
            'testRequest_id' => '16',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '2',
            'testRequest_id' => '17',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '3',
            'testRequest_id' => '18',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '4',
            'testRequest_id' => '19',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '5',
            'testRequest_id' => '20',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '6',
            'testRequest_id' => '21',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '12:00 PM - 14:00 PM',
            'nurse_id' => '16',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '7',
            'testRequest_id' => '22',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '8',
            'testRequest_id' => '23',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '9',
            'testRequest_id' => '24',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '10',
            'testRequest_id' => '25',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '12:00 PM - 14:00 PM',
            'nurse_id' => '16',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '11',
            'testRequest_id' => '26',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '12:00 PM - 14:00 PM',
            'nurse_id' => '16',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '12',
            'testRequest_id' => '27',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '12:00 PM - 14:00 PM',
            'nurse_id' => '16',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '13',
            'testRequest_id' => '28',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '12:00 PM - 14:00 PM',
            'nurse_id' => '16',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '14',
            'testRequest_id' => '29',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '14:00 PM - 16:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '15',
            'testRequest_id' => '30',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '14:00 PM - 16:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '16',
            'testRequest_id' => '1',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '17',
            'testRequest_id' => '2',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '18',
            'testRequest_id' => '3',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '19',
            'testRequest_id' => '4',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '20',
            'testRequest_id' => '5',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '10:00 AM - 12:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '21',
            'testRequest_id' => '6',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '14:00 PM - 16:00 PM',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_bookings')->insert([
            'id' => '22',
            'testRequest_id' => '15',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'time_slot' => '08:00 AM - 10:00 AM',
            'nurse_id' => '15',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
