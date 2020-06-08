<?php

use Illuminate\Database\Seeder;

class PlusInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PlusInformation::class, 100)->create();
    }
}
