<?php

namespace App\Http\Controllers;

use App\Models\Class_code;
use App\Models\Score;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = new Student();
        $student = $students->index();
        return  view('students.index',[
            'students' => $student
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class_codes = new Class_code();
        $class_code = $class_codes->index();
        return view('students.create',[
            'class_codes' => $class_code
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $student = new  Student();
        $student->name_students = $request->name_students;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->date_of_birth = $request->date_of_birth;
        $student->address = $request->address;
        $student->email = $request->email;
        $student->account = $request->account;
        $student->password = $request->password;
        $student->class_codes_id = $request->class_codes_id;
        $student->store();
        return Redirect::route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $class_codes = new Class_code();
        $class_code = $class_codes->index();
        return  view('students.edit',[
            'student' => $student,
            'class_codes' => $class_code,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->name_students = $request->name_students;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->date_of_birth = $request->date_of_birth;
        $student->address = $request->address;
        $student->email = $request->email;
        $student->account = $request->account;
        $student->password = $request->password;
        $student->edit();
        return Redirect::route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //xoa diem sv
        $score = new Score();
        $score->student_id = $student->id;
        $score->deleteByIdDIEM();
        //xoa sv
        $student->deleter();
        return Redirect::route('students.index');
    }
}
