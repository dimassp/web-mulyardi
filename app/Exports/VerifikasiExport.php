<?php

namespace App\Exports;

use App\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class VerifikasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pendaftaran = Pendaftaran::get();
        return $pendaftaran;
    }
}
