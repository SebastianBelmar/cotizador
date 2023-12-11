<?php

namespace Database\Factories;

use App\Models\AccessPdf;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccessPdfFactory extends Factory
{
    protected $model =AccessPdf::class;

    public function definition(): array
    {

        return [
            'expired_at' => now(),
        ];
    }
}
