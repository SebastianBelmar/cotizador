<?php

namespace Database\Seeders;

use App\Models\Cotizacione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CotizacioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cotizaciones = Cotizacione::factory(10)->create();

    }
}
