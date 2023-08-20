<?php

namespace Database\Factories;

use App\Models\Cotizacione;
use App\Models\ItemProducto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemProducto>
 */
class ItemProductoFactory extends Factory
{
    protected $model = ItemProducto::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->regexify('[0-9]{3}'),
            'name' => $this->faker->unique()->word(20),
            'lenght' => $this->faker->regexify('[0-9]{2}'),
            'width' => $this->faker->regexify('[0-9]{2}'),            
            'quantity' => $this->faker->regexify('[0-9]{1}'),            
            'price' => $this->faker->randomFloat(2, 1000, 5000),
            'cotizacione_id' => Cotizacione::all()->random()->id,
        ];
    }
}
