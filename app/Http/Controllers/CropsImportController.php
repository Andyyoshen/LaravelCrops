<?php

namespace App\Http\Controllers;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CropsImportController extends Controller
{
    //
    public function index()
    {
        $cropslist = DB::select('select * from  crops');

        return $cropslist;
    }
    public function import(Request $request) 
    {
        
        $storagePath = Storage::put('/public', $request['CropsImportFileData']);
        $fileName = basename($storagePath);
          $data = Excel::import(new UsersImport,  "D:/nginx-1.21.3/LaravelDemo/storage/app/public/".$fileName);
          return array("Status"=>true,"Msg"=>"新增成功","Data"=>[$data]);
        }
}
