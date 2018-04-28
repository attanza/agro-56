<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(KomoditasSeeder::class);
        $this->call(JenisSaprotanSeeder::class);
        $this->call(SaprotanSeeder::class);
        $this->call(VendorSeeder::class);   
    }
}
