<?php

use Illuminate\Database\Seeder;

class SaprotanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Saprotan::truncate();
        factory(App\Models\Saprotan::class, 3)->create();
    }
}
