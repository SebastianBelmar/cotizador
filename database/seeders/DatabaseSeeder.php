<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\DetallesTermino;
use App\Models\DatosEmpresa;
use App\Models\ItemProducto;
use App\Models\Producto;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);


        Cliente::factory(10)->create();
        DetallesTermino::factory(10)->create();
        DatosEmpresa::factory(10)->create();
        Producto::factory(10)->create();

        $this->call(CotizacioneSeeder::class);

        ItemProducto::factory(100)->create();
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
