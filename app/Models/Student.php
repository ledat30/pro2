<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    public function index()
    {
        $students = DB::table('students')
            ->select([
                'students.id',
                'students.name_students',
                'students.date_of_birth',
                'students.gender',
                'class_codes.name_class_codes',
            ])
            ->join('class_codes', 'students.class_codes_id', '=', 'class_codes.id')
            ->get();
        return $students;
    }
    public function store(){
        DB::table('students')
            ->insert([
                'name_students'=>$this->name_students,
                'gender'=>$this->gender,
                'phone'=>$this->phone,
                'class_codes_id'=>$this->class_codes_id,
                'date_of_birth'=>$this->date_of_birth,
                'address'=>$this->address,
                'email'=>$this->email,
                'account'=>$this->account,
                'password'=>$this->password,
            ]);
    }
    //updata
    public function edit(){
        DB::table('students')
            ->where('id' , $this->id)
            ->update([
                'name_students'=>$this->name_students,
                'gender'=>$this->gender,
                'phone'=>$this->phone,
                'class_codes_id'=>$this->class_codes_id,
                'date_of_birth'=>$this->date_of_birth,
                'address'=>$this->address,
                'email'=>$this->email,
                'account'=>$this->account,
                'password'=>$this->password,
            ]);
    }
    public function deleteByIdStudent(){
        DB::table('students')
            ->where('class_codes_id',$this->class_codes_id)
            ->delete();
    }
    public function deleter(){
        DB::table('students')
            ->where('id' ,$this->id)
            ->delete();
    }

}
