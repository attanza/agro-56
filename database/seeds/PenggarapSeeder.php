<?php

use Illuminate\Database\Seeder;

class PenggarapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Penggarap::truncate();
        factory(App\Models\Penggarap::class, 3)->create();
    }
}
