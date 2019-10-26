<?php

use Illuminate\Database\Seeder;

class EncuestaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Encuesta::class, 80)->create();
    }
}
