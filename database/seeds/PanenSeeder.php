<?php

use Illuminate\Database\Seeder;

class PanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Panen::truncate();
        factory(App\Models\Panen::class, 3)->create();
    }
}
