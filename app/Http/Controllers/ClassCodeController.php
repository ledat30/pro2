<?php

namespace App\Http\Controllers;

use App\Models\Class_code;
use App\Http\Requests\StoreClass_codeRequest;
use App\Http\Requests\UpdateClass_codeRequest;
use App\Models\Course;
use App\Models\Specialized;
use App\Models\Student;
use Illuminate\Support\Facades\Redirect;

class ClassCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_codes = new Class_code();
        $class_code = $class_codes->index();
        return  view('classcodes.index',[
            'classcodes' => $class_code
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
        $courses = new  Course();
        $course = $courses->index();
        return view('classcodes.create',[
            'specializeds' => $specialized,
            'courses' =>$course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClass_codeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClass_codeRequest $request)
    {
        $class_code = new Class_code();
        $class_code->name_class_codes = $request->name_class_codes;
        $class_code->specializeds_id = $request->specializeds_id;
        $class_code->courses_id = $request->courses_id;
        $class_code->store();
        return Redirect::route('classcodes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Class_code  $class_code
     * @return \Illuminate\Http\Response
     */
    public function show(Class_code $class_code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Class_code  $class_code
     * @return \Illuminate\Http\Response
     */
    public function edit(Class_code $class_code)
    {
        $specializeds = new Specialized();
        $specialized = $specializeds->index();
        $courses = new Course();
        $course = $courses->index();
        return  view('classcodes.edit',[
            'class_code'=> $class_code,
            'specializeds' => $specialized,
            'courses' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClass_codeRequest  $request
     * @param  \App\Models\Class_code  $class_code
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClass_codeRequest $request, Class_code $class_code)
    {
        $class_code->name_class_codes = $request->name_class_codes;
        $class_code->edit();
        return Redirect::route('classcodes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Class_code  $class_code
     * @return \Illuminate\Http\Response
     */
    public function destroy(Class_code $class_code)
    {
        //xoa sv
        $student = new Student();
        $student->class_codes_id = $class_code->id;
        $student->deleteByIdStudent();
        //xoa lop
        $class_code->deleter();
        return Redirect::route('classcodes.index');
    }
}
