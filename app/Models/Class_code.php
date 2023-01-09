<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Class_code extends Model
{
    use HasFactory;
    public function index()
    {
        $class_codes = DB::table('class_codes')
            ->select([
                'class_codes.id',
                'class_codes.name_class_codes',
                'specializeds.name_specializeds',
                'courses.name_courses',
            ])
            ->join('specializeds' ,'class_codes.specializeds_id' ,'=' , 'specializeds.id')
            ->join('courses', 'class_codes.courses_id', '=', 'courses.id')
            ->get();
        return $class_codes;
    }
    public function store(){
        DB::table('class_codes')
            ->insert([
                'name_class_codes'=>$this->name_class_codes,
                'specializeds_id'=>$this->specializeds_id,
                'courses_id'=>$this->courses_id,
            ]);
    }
    //updata
    public function edit(){
        DB::table('class_codes')
            ->where('id' ,$this->id)
            ->update([
                'name_class_codes'=>$this->name_class_codes,
            ]);
    }
    public function deleteByIdClass(){
        DB::table('class_codes')
            ->where('specializeds_id',$this->specializeds_id)
            ->delete();
    }
    public function deleteByIdClass_code(){
        DB::table('class_codes')
            ->where('courses_id',$this->courses_id)
            ->delete();
    }
    public function deleter(){
        DB::table('class_codes')
            ->where('id' ,$this->id)
            ->delete();
    }
}
