<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('indexDM',[\App\Http\Controllers\indexControllers::class ,'index']);
Route::prefix('specialized-manage')->group(function(){
    Route::get('/specialized',[\App\Http\Controllers\SpecializedController::class , 'index'])->name('specializeds.index');
    Route::get('/specialized/create', [\App\Http\Controllers\SpecializedController::class , 'create'])->name('specializeds.create');
    Route::post('/specialized/create', [\App\Http\Controllers\SpecializedController::class , 'store'])->name('specializeds.store');
    Route::get('/specialized/{specialized}/edit', [\App\Http\Controllers\SpecializedController::class, 'edit'])->name('specializeds.edit');
    Route::put('/specialized/{specialized}/edit', [\App\Http\Controllers\SpecializedController::class, 'update'])->name('specializeds.update');
    Route::delete('/specialized/{specialized}', [\App\Http\Controllers\SpecializedController::class, 'destroy'])->name('specializeds.destroy');
});
Route::prefix('course-manage')->group(function(){
    Route::get('/courses',[\App\Http\Controllers\CourseController::class , 'index'])->name('courses.index');
    Route::get('/courses/create', [\App\Http\Controllers\CourseController::class , 'create'])->name('courses.create');
    Route::post('/courses/create', [\App\Http\Controllers\CourseController::class , 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit', [\App\Http\Controllers\CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}/edit', [\App\Http\Controllers\CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [\App\Http\Controllers\CourseController::class, 'destroy'])->name('courses.destroy');
});
Route::prefix('subject-manage')->group(function (){
    Route::get('/subject',[\App\Http\Controllers\SubjectController::class ,'index'])->name('subjects.index');
    Route::get('/subject/create',[\App\Http\Controllers\SubjectController::class, 'create'])->name('subjects.create');
    Route::post('/subject/create' ,[\App\Http\Controllers\SubjectController::class, 'store'])->name('subjects.store');
    Route::get('subject/{subject}/edit' ,[\App\Http\Controllers\SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('subject/{subject}/edit' ,[\App\Http\Controllers\SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/subject/{subject}', [\App\Http\Controllers\SubjectController::class, 'destroy'])->name('subjects.destroy');
});
Route::prefix('teacher-manage')->group(function (){
    Route::get('/teacher',[\App\Http\Controllers\TeacherController::class,'index'])->name('teachers.index');
    Route::get('/teacher/create',[\App\Http\Controllers\TeacherController::class ,'create'])->name('teachers.create');
    Route::post('/teacher/create' ,[\App\Http\Controllers\TeacherController::class, 'store'])->name('teachers.store');
    Route::get('teacher/{teacher}/edit' ,[\App\Http\Controllers\TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('teacher/{teacher}/edit' ,[\App\Http\Controllers\TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teacher/{teacher}', [\App\Http\Controllers\TeacherController::class, 'destroy'])->name('teachers.destroy');
});
Route::prefix('allot-manage')->group(function () {
    Route::get('/allot', [\App\Http\Controllers\AllotController::class, 'index'])->name('allots.index');
    Route::get('/allot/create', [\App\Http\Controllers\AllotController::class, 'create'])->name('allots.create');
    Route::post('/allot/create', [\App\Http\Controllers\AllotController::class, 'store'])->name('allots.store');
    Route::get('allot/{allot}/edit', [\App\Http\Controllers\AllotController::class, 'edit'])->name('allots.edit');
    Route::put('allot/{allot}/edit', [\App\Http\Controllers\AllotController::class, 'update'])->name('allots.update');
    Route::delete('/allot/{allot}', [\App\Http\Controllers\AllotController::class, 'destroy'])->name('allots.destroy');
});
Route::prefix('classcode-manage')->group(function () {
    Route::get('/class_code', [\App\Http\Controllers\ClassCodeController::class, 'index'])->name('classcodes.index');
    Route::get('/class_code/create', [\App\Http\Controllers\ClassCodeController::class, 'create'])->name('classcodes.create');
    Route::post('/class_code/create', [\App\Http\Controllers\ClassCodeController::class, 'store'])->name('classcodes.store');
    Route::get('class_code/{class_code}/edit', [\App\Http\Controllers\ClassCodeController::class, 'edit'])->name('classcodes.edit');
    Route::put('class_code/{class_code}/edit', [\App\Http\Controllers\ClassCodeController::class, 'update'])->name('classcodes.update');
    Route::delete('/class_code/{class_code}', [\App\Http\Controllers\ClassCodeController::class, 'destroy'])->name('classcodes.destroy');
});
Route::prefix('student-manage')->group(function () {
    Route::get('/student', [\App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
    Route::get('/student/create', [\App\Http\Controllers\StudentController::class, 'create'])->name('students.create');
    Route::post('/student/create', [\App\Http\Controllers\StudentController::class, 'store'])->name('students.store');
    Route::get('student/{student}/edit', [\App\Http\Controllers\StudentController::class, 'edit'])->name('students.edit');
    Route::put('student/{student}/edit', [\App\Http\Controllers\StudentController::class, 'update'])->name('students.update');
    Route::delete('/student/{student}', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('students.destroy');
});
///
///
Route::prefix('score-manage')->group(function () {
    Route::get('/score', [\App\Http\Controllers\ScoreController::class, 'index'])->name('scores.index');
    Route::get('/score/create', [\App\Http\Controllers\ScoreController::class, 'create'])->name('scores.create');
    Route::post('/score/create', [\App\Http\Controllers\ScoreController::class, 'store'])->name('scores.store');
    Route::get('score/{score}/edit', [\App\Http\Controllers\ScoreController::class, 'edit'])->name('scores.edit');
    Route::put('score/{score}/edit', [\App\Http\Controllers\ScoreController::class, 'update'])->name('scores.update');
    Route::delete('/score/{score}', [\App\Http\Controllers\ScoreController::class, 'destroy'])->name('scores.destroy');

    Route::get('/totalscore',[\App\Http\Controllers\ScoreController::class ,'TotalSubjectScore'])->name('scores.TotalScore');
});
