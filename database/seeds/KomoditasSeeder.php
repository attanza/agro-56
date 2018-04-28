<?php

use Illuminate\Database\Seeder;

class KomoditasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Komoditas::truncate();
        factory(App\Models\Komoditas::class, 3)->create();
    }
}
