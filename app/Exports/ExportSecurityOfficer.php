<?php

namespace App\Exports;

use App\Models\SecurityOfficer;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSecurityOfficer implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SecurityOfficer::all();
    }
}
