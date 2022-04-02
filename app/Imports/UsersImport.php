<?php

namespace App\Imports;

use App\Models\crops;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon;
class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return 1;
        return new crops([
            'SerialNumber'     => $row[0],
            'ManuFacturer'    => $row[1], 
            'Author' => $row[2],
            'Price' => $row[3],
            'OutDate' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4])->format('Y/m/d')
        ]);
    }
}
