<?php

namespace Database\Factories;

use App\Models\DetallesTerminosGenerale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetallesTerminosGenerale>
 */
class DetallesTerminosGeneraleFactory extends Factory
{
    protected $model = DetallesTerminosGenerale::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->sentence();

        return [
            'description' => $name,
            'status' => $this->faker->randomElement([1, 2]),
        ];
    }
}
