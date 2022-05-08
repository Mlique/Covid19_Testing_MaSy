<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //User::factory()->times(10)->create();

         DB::table('users')->insert([
            'id' => '1',
            'email' => 'maria@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Maria',
            'last_name' => 'Madi',
            'status' => 'Active',
            'user_type' => 'M',

        ]);
         DB::table('users')->insert([
            'id' => '2',
            'email' => 'charmaine@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Charmaine',
            'last_name' => 'Meintjies',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '3',
            'email' => 'jacob@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Jacob',
            'last_name' => 'Moloi',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '4',
            'email' => 'davide@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'David',
            'last_name' => 'Greeff',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '5',
            'email' => 'kopano@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Kopano',
            'last_name' => 'Sithole',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '6',
            'email' => 'karien@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Karien',
            'last_name' => 'Momberg',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
        DB::table('users')->insert([
            'id' => '7',
            'email' => 'felicityONP400@gmail.com',
            'first_name' => 'Felicity',
            'last_name' => 'Daniels',
            'password' => bcrypt('12345678'),
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '8',
            'email' => 'errol@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Errol ',
            'last_name' => 'Pieterse',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '9',
            'email' => 'alyce@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Alyce',
            'last_name' => 'Morapedi',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '10',
            'email' => 'asha@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Asha',
            'last_name' => 'Sharma',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '11',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Carlos',
            'last_name' => 'Perestrelo',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '12',
            'email' => 'kabelo@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Kabelo',
            'last_name' => 'Padi',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '13',
            'email' => 'pulane@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Pulane',
            'last_name' => 'Masemola',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '14',
            'email' => 'dorothy@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Dorothy',
            'last_name' => 'Daniels',
            'status' => 'Active',
            'user_type' => 'N',
        ]);
         DB::table('users')->insert([
            'id' => '15',
            'email' => 'lindile@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Lindile',
            'last_name' => 'Hadebe',
            'status' => 'Active',
            'user_type' => 'N',
        ]);
         DB::table('users')->insert([
            'id' => '16',
            'email' => 'marcel@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Marcel',
            'last_name' => 'Van Niekerk',
            'status' => 'Active',
            'user_type' => 'N',
        ]);
         DB::table('users')->insert([
            'id' => '17',
            'email' => 'mandla@gmail.com',
            'password' => bcrypt('12345678'),
            'first_name' => 'Mandla',
            'last_name' => 'Khumalo',
            'status' => 'Active',
            'user_type' => 'L',
        ]);
    }
}
