<?php

use Illuminate\Database\Seeder;

use App\Code;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Code::Create([
          'code'  =>  null
        ]);
    }
}
