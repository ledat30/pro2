<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Allot extends Model
{
    use HasFactory;

    public function index()
    {
        $allots = DB::table('allots')
            ->select([
                'allots.id',
                'allots.start_date_allots',
                'subjects.name_subjects',
                'teachers.name_teachers'
            ])
            ->join('teachers' ,'allots.teacher_id' ,'=' , 'teachers.id')
            ->join('subjects', 'allots.subject_id', '=', 'subjects.id')
            ->get();
        return $allots;
    }
    public function store(){
        DB::table('allots')
            ->insert([
                'start_date_allots'=>$this->start_date_allots,
                'subject_id'=>$this->subject_id,
                'teacher_id'=>$this->teacher_id,
            ]);
    }
    //updata
    public function edit(){
        DB::table('allots')
            ->where('id' , $this->id)
            ->update([
                'start_date_allots'=>$this->start_date_allots,
            ]);
    }
    public function deleteByIdAllot(){
        DB::table('allots')
            ->where('subject_id',$this->subject_id)
            ->delete();
    }
    public function deleteByIdAllots(){
        DB::table('allots')
            ->where('teacher_id',$this->teacher_id)
            ->delete();
    }
    public function deleter(){
        DB::table('allots')
            ->where('id' ,$this->id)
            ->delete();
    }
}
