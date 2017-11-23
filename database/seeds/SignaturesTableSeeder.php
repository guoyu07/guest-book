<?php

use Illuminate\Database\Seeder;
use App\Signature;

class SignaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Signature::truncate();

        factory(Signature::class, 500)->create();
    }
}
