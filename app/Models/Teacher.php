<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teacher extends Model
{
    use HasFactory;
    public function index(){
        $teachers = DB::table('teachers')
            ->select([
                'teachers.id',
                'teachers.name_teachers',
                'teachers.gender',
                'teachers.phone',
                'specializeds.name_specializeds',
            ])
            ->join('specializeds' ,'teachers.specializeds_id' ,'=','specializeds.id')
            ->get();
        return $teachers;
    }
    public function store(){
        DB::table('teachers')
            ->insert([
                'name_teachers'=>$this->name_teachers,
                'gender'=>$this->gender,
                'phone'=>$this->phone,
                'specializeds_id'=>$this->specializeds_id,
                'date_of_birth'=>$this->date_of_birth,
                'address'=>$this->address,
                'email'=>$this->email,
                'account'=>$this->account,
                'password'=>$this->password,
            ]);
    }
    //updata
    public function edit(){
        DB::table('teachers')
            ->where('id' , $this->id)
            ->update([
                'name_teachers'=>$this->name_teachers,
                'gender'=>$this->gender,
                'phone'=>$this->phone,
                'specializeds_id'=>$this->specializeds_id,
                'date_of_birth'=>$this->date_of_birth,
                'address'=>$this->address,
                'email'=>$this->email,
                'account'=>$this->account,
                'password'=>$this->password,
            ]);
    }
    public function deleteByIdTeacher(){
        DB::table('teachers')
            ->where('specializeds_id',$this->specializeds_id)
            ->delete();
    }
    public function deleter(){
        DB::table('teachers')
            ->where('id' ,$this->id)
            ->delete();
    }
}

