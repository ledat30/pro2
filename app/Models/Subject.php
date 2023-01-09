<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subject extends Model
{
    use HasFactory;
    public  function index(){
        $subjects = DB::table('subjects')
            ->select([
            'subjects.id',
            'subjects.name_subjects',
            'subjects.start_date_subjects',
            'specializeds.name_specializeds',
        ])
            ->join('specializeds' ,'subjects.specializeds_id' ,'=','specializeds.id')
            ->get();
        return $subjects;
    }
    public function store(){
        DB::table('subjects')
            ->insert([
                'name_subjects'=>$this->name_subjects,
                'start_date_subjects'=>$this->start_date_subjects,
                'specializeds_id'=>$this->specializeds_id,
            ]);
    }
    //updata
    public function edit(){
        DB::table('subjects')
            ->where('id' , $this->id)
            ->update([
                'name_subjects'=>$this->name_subjects,
                'start_date_subjects' =>$this->start_date_subjects,
            ]);
    }
    public function deleteByIdSubject(){
            DB::table('subjects')
                ->where('specializeds_id',$this->specializeds_id)
                ->delete();
    }
    public function deleter(){
        DB::table('subjects')
            ->where('id' ,$this->id)
            ->delete();
    }
}
