<?php

namespace App\Http\Controllers;

use App\Models\Allot;
use App\Models\Score;
use App\Models\Specialized;
use App\Models\Subject;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = new Teacher();
        $teacher = $teachers->index();
        return  view('teachers.index',[
            'teachers' => $teacher
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializeds = new Specialized();
        $specialized = $specializeds->index();
        return view('teachers.create',[
            'specializeds' => $specialized
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = new  Teacher();
        $teacher->name_teachers = $request->name_teachers;
        $teacher->gender = $request->gender;
        $teacher->phone = $request->phone;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->address = $request->address;
        $teacher->email = $request->email;
        $teacher->account = $request->account;
        $teacher->password = $request->password;
        $teacher->specializeds_id = $request->specializeds_id;
        $teacher->store();
        return Redirect::route('teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $specializeds = new Specialized();
        $specialized = $specializeds->index();
        return  view('teachers.edit',[
            'teacher' => $teacher,
            'specializeds' => $specialized,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->name_teachers = $request->name_teachers;
        $teacher->gender = $request->gender;
        $teacher->phone = $request->phone;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->address = $request->address;
        $teacher->email = $request->email;
        $teacher->account = $request->account;
        $teacher->password = $request->password;
        $teacher->edit();
        return Redirect::route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //xao allot
        $allot = new Allot();
        $allot->teacher_id = $teacher->id;
        $allot->deleteByIdAllots();
        //XOA DIEM
        $score = new  Score();
        $score->teacher_id = $teacher->id;
        $score->deleteByIdScore();
        //xoa gv
        $teacher->deleter();
        return Redirect::route('teachers.index');
    }
}
