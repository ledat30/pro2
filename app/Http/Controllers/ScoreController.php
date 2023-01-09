<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Redirect;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = new Score();
        $score  = $scores->index();
        return  view('scores.index',[
            'scores' => $score
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
        $students= new Student();
        $student = $students->index();
        return view('scores.create',[
            'teachers' => $teacher,
            'subjects' =>$subject,
            'students' =>$student
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScoreRequest $request)
    {
        $score = new Score();
        $score->score = $request->score;
        $score->subject_id = $request->subject_id;
        $score->teacher_id = $request->teacher_id;
        $score->student_id = $request->student_id;
        $score->store();
        return Redirect::route('scores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        $teachers = new Teacher();
        $teacher = $teachers->index();
        $subjects = new Subject();
        $subject = $subjects->index();
        $students = new Student();
        $student = $students->index();
        return  view('scores.edit',[
            'score'=> $score,
            'teachers' => $teacher,
            'subjects' => $subject,
            'students' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScoreRequest  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScoreRequest $request, Score $score)
    {
        $score->score = $request->score;
        $score->edit();
        return Redirect::route('scores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        $score->deleter();
        return Redirect::route('scores.index');
    }
    public  function  TotalSubjectScore(){
        $totalscores = new Score();
        $totalscore = $totalscores->TotalSubjectScore();
        dd($totalscore);
        return view('scores.total-subject-score',[
            'totalscores' =>$totalscore
        ]);
    }
}
