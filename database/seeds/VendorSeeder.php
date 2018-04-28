<?php

use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Vendor::truncate();
        factory(App\Models\Vendor::class, 3)->create();
    }
}
