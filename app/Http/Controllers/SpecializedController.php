<?php

namespace App\Http\Controllers;

use App\Models\Class_code;
use App\Models\Specialized;
use App\Http\Requests\StoreSpecializedRequest;
use App\Http\Requests\UpdateSpecializedRequest;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Redirect;

class SpecializedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tao doi tuong
        $specializeds = new Specialized();
        //lay data ve hien thi
        $specialized = $specializeds->index();
        return view('specializeds.index',[
            //gui view bien => du lieu
            'specializeds' => $specialized
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('specializeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecializedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecializedRequest $request)
    {
            $specialized = new Specialized();
            $specialized->name_specializeds = $request->name_specializeds;
            $specialized->store();
            return Redirect::route('specializeds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialized  $specialized
     * @return \Illuminate\Http\Response
     */
    public function show(Specialized $specialized)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialized  $specialized
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialized $specialized)
    {

        return view('specializeds.edit',[
            'specialized' => $specialized
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecializedRequest  $request
     * @param  \App\Models\Specialized  $specialized
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecializedRequest $request, Specialized $specialized)
    {
        $specialized->name_specializeds = $request->name_specializeds;
        $specialized->edit();
        return Redirect::route('specializeds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialized  $specialized
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialized $specialized)
    {
        //xoa môn
        $subject = new Subject();
        $subject->specializeds_id = $specialized->id;
        $subject->deleteByIdSubject();
        //xoa gv
        $teacher = new Teacher();
        $teacher->specializeds_id = $specialized->id;
        $teacher->deleteByIdTeacher();
        // xoa lop
        $class_code = new Class_code();
        $class_code->specializeds_id = $specialized->id;
        $class_code->deleteByIdClass();
        //thuc hien xoa khoá chính ngành
        $specialized->deleter();
        return Redirect::route('specializeds.index');
    }
}
