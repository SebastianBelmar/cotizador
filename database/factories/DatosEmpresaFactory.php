<?php

namespace Database\Factories;

use App\Models\DatosEmpresa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DatosEmpresa>
 */
class DatosEmpresaFactory extends Factory
{

    protected $model = DatosEmpresa::class;

    public function definition(): array
    {
        //slug elimina espacios con - , ej: buenos-dias
        $name = $this->faker->unique()->word(20);

        return [
            'name' => $name,
            'logo' => $this->faker->mimeType(),
            'address' => $this->faker->sentence(2),
            'city' => $this->faker->city(),
            'website' => 'www.' . $this->faker->unique()->word(20) .'.com',
            'phone' => $this->faker->unique()->regexify('[0-9]{8}'),
            'email' => $this->faker->unique()->safeEmail(),
            'office_hours' => 'desde las ' . (string)$this->faker->numberBetween(8, 12) .' hasta las '. (string)$this->faker->numberBetween(14, 18),

        ];
    }
}
