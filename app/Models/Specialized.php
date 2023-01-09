<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Specialized extends Model
{
    use HasFactory;
    public function index(){
        //taobien
       $specializeds = DB::table('specializeds')
            ->get();
       return $specializeds ;
    }
    public  function store(){
        DB::table('specializeds')
            ->insert([
                'name_specializeds'=> $this->name_specializeds,
            ]);
    }
    //updata
    public function edit(){
        DB::table('specializeds')
            ->where('id' ,$this->id)
            ->update([
                'name_specializeds'=> $this->name_specializeds,
            ]);
    }
    public function deleter(){
        DB::table('specializeds')
            ->where('id' ,$this->id)
            ->delete();
    }
}
