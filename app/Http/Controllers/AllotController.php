<?php

namespace App\Http\Controllers;

use App\Models\Allot;
use App\Http\Requests\StoreAllotRequest;
use App\Http\Requests\UpdateAllotRequest;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Redirect;

class AllotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allots = new Allot();
        $allot = $allots->index();
        return  view('allots.index',[
            'allots' => $allot
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = new Teacher();
        $teacher = $teachers->index();
        $subjects = new  Subject();
        $subject = $subjects->index();
        return view('allots.create',[
            'teachers' => $teacher,
            'subjects' =>$subject
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAllotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAllotRequest $request)
    {
        $allot = new Allot();
        $allot->start_date_allots = $request->start_date_allots;
        $allot->subject_id = $request->subject_id;
        $allot->teacher_id = $request->teacher_id;
        $allot->store();
        return Redirect::route('allots.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Allot  $allot
     * @return \Illuminate\Http\Response
     */
    public function show(Allot $allot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Allot  $allot
     * @return \Illuminate\Http\Response
     */
    public function edit(Allot $allot)
    {
        $teachers = new Teacher();
        $teacher = $teachers->index();
        $subjects = new Subject();
        $subject = $subjects->index();
        return  view('allots.edit',[
            'allot'=> $allot,
            'teachers' => $teacher,
            'subjects' => $subject,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAllotRequest  $request
     * @param  \App\Models\Allot  $allot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAllotRequest $request, Allot $allot)
    {
        $allot->start_date_allots = $request->start_date_allots;
        $allot->edit();
        return Redirect::route('allots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Allot  $allot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allot $allot)
    {
        $allot->deleter();
        return Redirect::route('allots.index');
    }
}
