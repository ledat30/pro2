<?php

namespace App\Http\Controllers;

use App\Models\Allot;
use App\Models\Score;
use App\Models\Specialized;
use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Support\Facades\Redirect;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = new Subject();
        $subject = $subjects->index();
        return  view('subjects.index',[
            'subjects' => $subject
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
        return view('subjects.create',[
            'specializeds' => $specialized
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
            $subject = new  Subject();
            $subject->name_subjects = $request->name_subjects;
            $subject->start_date_subjects = $request->start_date_subjects;
            $subject->specializeds_id = $request->specializeds_id;
            $subject->store();
            return Redirect::route('subjects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $specializeds = new Specialized();
        $specialized = $specializeds->index();
        return  view('subjects.edit',[
            'subject' => $subject,
            'specializeds' => $specialized,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
      $subject->name_subjects = $request->name_subjects;
      $subject->start_date_subjects = $request->start_date_subjects;
        $subject->edit();
        return Redirect::route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
         //xoa allot
        $allot = new Allot();
        $allot->subject_id = $subject->id;
        $allot->deleteByIdAllot();
        $score = new Score();
        $score->subject_id = $subject->id;
        $score->deleteByIdScores();
        //xoa subject
        $subject->deleter();
        return Redirect::route('subjects.index');
    }
}
