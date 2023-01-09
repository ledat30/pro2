<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;
    public function index(){
        //taobien
        $courses = DB::table('courses')
            ->get();
        return $courses ;
    }
    public  function store(){
        DB::table('courses')
            ->insert([
                'name_courses'=> $this->name_courses,
                'start_date_courses'=>$this->start_date_courses,
            ]);
    }
    //updata
    public function edit(){
        DB::table('courses')
            ->where('id' ,$this->id)
            ->update([
                'name_courses'=> $this->name_courses,
                'start_date_courses'=>$this->start_date_courses,
            ]);
    }
    public function deleter(){
        DB::table('courses')
            ->where('id' ,$this->id)
            ->delete();
    }
}
