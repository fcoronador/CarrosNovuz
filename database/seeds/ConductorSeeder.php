<?php

use Illuminate\Database\Seeder;

class ConductorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\conductor::class, 10)->create();
    }
}
