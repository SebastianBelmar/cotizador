<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessPdf extends Model
{
    use HasFactory;

    protected $fillable = ['expired_at'];

    public function haCaducado()
    {
        return now()->greaterThan($this->expired_at);
    }
}
