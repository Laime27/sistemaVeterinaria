<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\servicios;

class ServiciosSeeder extends Seeder
{
    public function run(): void
    {
        servicios::factory(10)->create();
    }
}
