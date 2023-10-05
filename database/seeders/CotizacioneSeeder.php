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
        $cotizaciones = Cotizacione::factory(100)->create();

        foreach ($cotizaciones as $cotizacion) {
            $cotizacion->datos_empresa()->attach([
                rand(1,9)
            ]);
            $cotizacion->detalles_termino()->attach([
                rand(1,9)
            ]);
        }
    }
}
