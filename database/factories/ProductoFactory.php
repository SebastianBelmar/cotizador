<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition(): array
    {
        //slug elimina espacios con - , ej: buenos-dias
        $name = $this->faker->unique()->word(20);

        return [
            'code' => $this->faker->unique()->regexify('[0-9]{3}'),
            'name' => $name,
            'description' => $this->faker->unique()->sentence(10),
            'price' => $this->faker->randomFloat(2, 1000, 5000),
        ];
    }
}
