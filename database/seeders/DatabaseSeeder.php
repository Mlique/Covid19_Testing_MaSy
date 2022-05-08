<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(SuburbSeeder::class);
        $this->call(MedicalAidSeeder::class);
        $this->call(MedicalPlanSeeder::class);
        $this->call(DependentSeeder::class);
        $this->call(TestRequestSeeder::class);
        $this->call(NurseSeeder::class);
        $this->call(LabUserSeeder::class);
        $this->call(TestBookingSeeder::class);
        $this->call(TestResultSeeder::class);
        $this->call(MainMemberSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(FavouriteSeeder::class);
    }
}
