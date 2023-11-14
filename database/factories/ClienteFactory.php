<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        //slug elimina espacios con - , ej: buenos-dias
        $name = $this->faker->unique()->word(20);

        return [
            'name' => $name,
            'rut' => $this->faker->unique()->regexify('[0-9]{8}-[0-9]{1}'),
            'web' => 'www.' . $this->faker->unique()->word(20) .'.com',
            'giro' => $this->faker->sentence(2),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->regexify('[0-9]{8}'),
            'address' => $this->faker->sentence(2),
            'city' => $this->faker->word(20),
            'horario' => $this->faker->regexify('Lun a Vi [0-9]{1}:00 a 1[0-9]{1}:00 hrs')
        ];
    }
}
