<?php

use Illuminate\Database\Seeder;

class PasanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Pasangan::truncate();
        factory(App\Models\Pasangan::class, 3)->create();
    }
}
