<?php

namespace Database\Factories;

use App\Models\Cotizacione;
use App\Models\ItemProducto;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemProducto>
 */
class ItemProductoFactory extends Factory
{
    protected $model = ItemProducto::class;

    public function definition(): array
    {
        $producto = Producto::all()->random();

        return [
            'code' => $producto->code,
            'name' => $producto->name,
            'description' => $this->faker->unique()->sentence(10),
            'lenght' => $this->faker->regexify('[0-9]{2}'),
            'width' => $this->faker->regexify('[0-9]{2}'),
            'quantity' => $this->faker->regexify('[1-9]{1}'),
            'price' => $producto->price,
            'total' => $producto->price,
            'cotizacione_id' => Cotizacione::all()->random()->id,
        ];
    }
}
