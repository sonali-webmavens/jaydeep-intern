<?php

namespace Database\Seeders;

use App\Models\NewCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewCompanyseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewCompany::factory()->count(5)->create();
    }
}
