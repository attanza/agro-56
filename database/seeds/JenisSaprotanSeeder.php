<?php

use Illuminate\Database\Seeder;

class JenisSaprotanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\JenisSaprotan::truncate();
        factory(App\Models\JenisSaprotan::class, 3)->create();
    }
}
