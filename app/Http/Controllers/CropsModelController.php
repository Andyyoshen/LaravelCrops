<?php

namespace App\Http\Controllers;

use App\Models\CropsModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CropsModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CropsModel  $cropsModel
     * @return \Illuminate\Http\Response
     */
    public function show(CropsModel $cropsModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CropsModel  $cropsModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CropsModel $cropsModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CropsModel  $cropsModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CropsModel $cropsModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CropsModel  $cropsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CropsModel $cropsModel)
    {
        //
    }
    public function DeleteCrops(Request $request){
        $SerialNumber = $request->U_data["SerialNumber"];
        
        $cropslist = DB::delete(" DELETE FROM crops WHERE SerialNumber='{$SerialNumber}'");
        $TrueResponceData = array("Status"=>true,"Msg"=>"刪除成功: 刪除了{$cropslist}筆資訊","Data"=>[]);

        if($cropslist != 0){
            return json_encode($TrueResponceData);
        }
        
    }
    public function UpdateCrops(Request $request){
        
        $SerialNumber = $request->U_data["SerialNumber"];
        $ManuFacturer = $request->U_data["ManuFacturer"];
        $Author = $request->U_data["Author"];
        $Price = $request->U_data["Price"];
        $OutDate = $request->U_data["OutDate"];
        
        $cropslist = DB::update("   UPDATE crops
                                    SET  ManuFacturer='{$ManuFacturer}', Author='{$Author}', Price='{$Price}',OutDate='{$OutDate}'
                                    WHERE SerialNumber='{$SerialNumber}'");
        $TrueResponceData = array("Status"=>true,"Msg"=>"新增成功: 更新了{$cropslist}筆資訊","Data"=>[]);

           if($cropslist != 0){
                return json_encode($TrueResponceData);
            }
            
        
    }
    public function InsertCrops(Request $request){

        $TrueResponceData = array("Status"=>true,"Msg"=>"新增成功","Data"=>[]);
        $SerialNumber = $request->U_data["SerialNumber"];
        $ManuFacturer = $request->U_data["ManuFacturer"];
        $Author = $request->U_data["Author"];
        $Price = $request->U_data["Price"];
        $OutDate = $request->U_data["OutDate"];
        $cropslist = DB::insert("   INSERT INTO crops (`SerialNumber`,`ManuFacturer`, `Author`, `Price`, `OutDate`) 
                                    VALUES ('{$SerialNumber}','{$ManuFacturer}','{$Author}','{$Price}','{$OutDate}')");
           if($cropslist == 1){
               return json_encode($TrueResponceData);
           }
        //    return $cropslist;
        
    }
    public function GetCropsList(Request $request){
        $SerialNumber = $request->U_data["SerialNumber"];
        $SortDirection = $request->U_data["SortDirection"];
        $start = $request->U_data["RowStart"];
        $per = $request->U_data["RowPer"];
        $cropslist = DB::select("SELECT * FROM  crops ORDER BY {$SerialNumber} {$SortDirection} LIMIT {$start}, {$per}");
            return $cropslist;
        
    }
    public function CropsRowTatle(Request $request){
        $NumData = DB::select("select * from crops order by idCrobs");
        $per = 4; //每頁顯示項目數量
        $LastPage = ceil(count($NumData) / $per); //取得不小於值的下一個整數
        if (is_null($request->U_data["Rowpage"])) { //假如$_GET["page"]未設置
            $page = 1; //則在此設定起始頁數
        } else {
            $page = intval($request->U_data["Rowpage"]); //確認頁數只能夠是數值資料
        }
        $start = ($page - 1) * $per; //每一頁開始的資料序號
        $TrueResponceData = array("Status"=>true,"Msg"=>"新增成功","Data"=>array("start"=>$start,"LastPage"=>$LastPage,"per"=>$per));
        return $TrueResponceData;
        
    }
}
