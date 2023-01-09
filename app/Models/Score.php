<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Score extends Model
{
    use HasFactory;
    public function index()
    {
        $scores = DB::table('scores')
            ->select([
                'scores.id',
                'scores.score',
                'subjects.name_subjects',
                'teachers.name_teachers',
                'students.name_students',
            ])
            ->join('students','scores.student_id','=','students.id')
            ->join('teachers' ,'scores.teacher_id' ,'=' , 'teachers.id')
            ->join('subjects', 'scores.subject_id', '=', 'subjects.id')
            ->get();
        return $scores;
    }
    public function store(){
        DB::table('scores')
            ->insert([
                'score'=>$this->score,
                'student_id'=>$this->student_id,
                'subject_id'=>$this->subject_id,
                'teacher_id'=>$this->teacher_id,
            ]);
    }
    //updata
    public function edit(){
        DB::table('scores')
            ->where('id' , $this->id)
            ->update([
                'score'=>$this->score,
            ]);
    }
    public function deleter(){
        DB::table('scores')
            ->where('id' ,$this->id)
            ->delete();
    }
    public function deleteByIdScore(){
        DB::table('scores')
            ->where('teacher_id',$this->teacher_id)
            ->delete();
    }
    public function deleteByIdScores(){
        DB::table('scores')
            ->where('subject_id',$this->subject_id)
            ->delete();
    }
    public function deleteByIdDIEM(){
        DB::table('scores')
            ->where('student_id',$this->student_id)
            ->delete();
    }
    public function TotalSubjectScore(){
        $totalscore =  DB::table('subjects')
            ->join('scores','subjects.id' , '=' ,'scores.subject_id')
            ->join('students','students.id','=', 'scores.student_id')
            ->select([
                'subjects.name_subjects',
                'students.name_students',
                'scores.score',
//                DB::raw('SUM((scores.score + scores.score + scores.score + scores.score + scores.score) - (subjects.name_subjects + subjects.name_subjects  + subjects.name_subjects  )) AS TotalSubjectScore ' )
            ])
//            ->groupBy('subjects.name_subjects')
//            ->groupBy('students.name_students')
            ->get();
        return $totalscore;
    }
}
