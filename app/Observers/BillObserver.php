<?php

namespace App\Observers;

use App\Models\Cotizacione;
use Illuminate\Support\Facades\Storage;

class BillObserver
{
    /**
     * Handle the Cotizacione "created" event.
     */
    public function created(Cotizacione $cotizacione): void
    {
        //
    }

    public function deleting(Cotizacione $cotizacione): void
    {
        if ( Storage::exists('/pdfs/'. $cotizacione->id . '.pdf')) {

            Storage::delete('/pdfs/'. $cotizacione->id . '.pdf');
        }
    }
}
