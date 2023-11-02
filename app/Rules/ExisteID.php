<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Cliente;

class ExisteID implements Rule
{
    public function passes($attribute, $value)
    {
        // Realiza la verificación en la base de datos
        return Cliente::where('id', $value)->exists();
    }

    public function message()
    {
        return 'El ID no existe en la base de datos.';
    }
}
