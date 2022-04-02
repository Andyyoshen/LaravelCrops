<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function index()
    {
        $cropslist = DB::select('select * from  crops');

        return $cropslist;
    }
    //
    public function ExportCrops(Request $request){
        $SerialNumber = $request->U_data["SerialNumber"];
        $SortDirection = $request->U_data["SortDirection"];
        $start = $request->U_data["RowStart"];
        $per = $request->U_data["RowPer"];
        $cropslist = DB::select("SELECT crops.SerialNumber, crops.ManuFacturer,crops.Author,crops.Price,crops.OutDate FROM  crops ORDER BY {$SerialNumber} {$SortDirection} LIMIT {$start}, {$per}");
        $export = new UsersExport($cropslist);
        return Excel::download($export, 'users.xlsx');
    }
}
