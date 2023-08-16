<?php

namespace Database\Factories;

use App\Models\DetallesTermino;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetallesTermino>
 */
class DetallesTerminoFactory extends Factory
{
    protected $model = DetallesTermino::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->sentence();

        return [
            'description' => $name,
            'status' => $this->faker->randomElement([1, 2]),
        ];
    }
}
