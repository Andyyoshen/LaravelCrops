<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DropDownListModel;
use Illuminate\Support\Facades\DB;

class DropDownListController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hello";
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
    public function GetDropdownList(Request $request)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        //
        $arr = [];
        array_push($arr,$request->Type,3);
        $out->writeln($arr);
        //print_r($arr);
        $dropdownlist = DB::select('select * from  dropdownlist where Type = ? ', $arr);
        return $dropdownlist;
    }
    public function SaveIetmList(Request $request)
    {
        //
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $arr = [];
        array_push($arr,$request->shopitem_id,$request->Price,$request->Count,$request->Total);
        $dropdownlist = DB::insert('insert into  itemlist(shopitem_id,Price,Count,Total) values(?,?,?,?) ', $arr);
        $out->writeln(dd($dropdownlist)); //注意DB的回傳質
        return dd($dropdownlist);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
