@extends('index')
@section('content')
    <div class="col-12">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Sửa điểm</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{route('scores.update',$score->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Score</label>
                                <input type="text" class="form-control" placeholder="score" name="score" value="{{$score->score}}" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_subjects</label>
                                <select name="subject_id" disabled>
                                    @foreach( $subjects as $subject )
                                        <option value="{{$subject->id}}"
                                                @if($subject->id == $score->specializeds_id)
                                                    selected
                                            @endif
                                        >{{$subject->name_subjects}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_student</label>
                                <select name="student_id" disabled>
                                    @foreach( $students as $student )
                                        <option value="{{$student->id}}"
                                                @if($student->id == $score->student_id)
                                                    selected
                                            @endif
                                        >{{$student->name_students}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_teachers</label>
                                <select name="teacher_id" disabled>
                                    @foreach( $teachers as $teacher )
                                        <option value="{{$teacher->id}}"
                                                @if($teacher->id == $score->teacher_id)
                                                    selected
                                            @endif
                                        >{{$teacher->name_teachers}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Edit allot</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

