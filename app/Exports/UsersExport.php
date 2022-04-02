<?php

namespace App\Exports;

use App\Models\animal;
use App\Models\CropsModel;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;



class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    //构造函数传值
        protected $data;

        public function __construct($data)
        {
            $this->data = $data;
        }
        public function collection()
        {
            return new Collection($this->data);
            // return new Collection([
            //     [1, 2, 3],
            //     [4, 5, 6]
            // ]);
            // return animal::all();
            // return DB::select('select * from  crops');
        }
        

}
