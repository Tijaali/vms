<?php

namespace App\Exports;

use App\Models\SecurityOfficer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportSecurityOfficer implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SecurityOfficer::all();
    }

    public function headings(): array{
        return [
            "ID",
            "Name",
            "Email",
            "Password",
            "Gender",
            "Date_of_birth",
            "Mobilenumber",
            "CNIC",
            "Address1",
            "Address2",
            "Designation",
            "Department_id",
            "Shift-start",
            "Shift-end",
            "Joing date",
            "Image",
            "User_id",
            "create_at",
            "updated_at"
        ];
        
    }
}
