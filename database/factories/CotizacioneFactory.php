<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Cotizacione;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cotizacione>
 */
class CotizacioneFactory extends Factory
{

    protected $model = Cotizacione::class;

    public function definition(): array
    {

        return [
            'fecha' => $this->faker->date(),
            'descuento' => $this->faker->randomFloat(2, 1000, 5000),
            'user_id' => User::all()->random()->id,
            'cliente_id' => Cliente::all()->random()->id,
        ];
    }
}
