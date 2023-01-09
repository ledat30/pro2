@extends('index')
@section('content')
    <div class="col-12">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Thêm điểm</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{ route('scores.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_student</label>
                                <select name="student_id">
                                    <option>-Choose-</option>
                                    @foreach( $students as $student )
                                        <option value="{{ $student->id }}"> {{ $student->name_students}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_subjects</label>
                                <select name="subject_id">
                                    <option>-Choose-</option>
                                    @foreach( $subjects as $subject )
                                        <option value="{{ $subject->id }}"> {{ $subject->name_subjects}} </option>
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
                                <select name="teacher_id">
                                    <option>-Choose-</option>
                                    @foreach( $teachers as $teacher )
                                        <option value="{{ $teacher->id }}"> {{ $teacher->name_teachers}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Score</label>
                                <input type="text" class="form-control" placeholder="score" name="score">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Add score</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

