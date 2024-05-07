<?php

namespace App\Exports;

use App\Models\Visitor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportVisitor implements FromCollection , WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $visitors=Visitor::all();
        return $visitors ;
    }
    public function headings(): array
    {
        return [
            'ID',"Name","Email","Password","Gender","Phone Number","CNIC","Address1","Address2","Category_id","Department_id","Visitee","From","To","Status","Purpose","Image","User_id","create_at","updated_at"
        ];
    }
}
