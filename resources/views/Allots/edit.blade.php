@extends('index')
@section('content')
    <div class="col-12">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Sửa phân công</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{route('allots.update',$allot->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Start_date_allots</label>
                                <input type="date" class="form-control" placeholder="Start_date_allots" name="start_date_allots" value="{{$allot->start_date_allots}}" >
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
                                                @if($subject->id == $allot->specializeds_id)
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
                                <label>Name_teachers</label>
                                <select name="teacher_id" disabled>
                                    @foreach( $teachers as $teacher )
                                        <option value="{{$teacher->id}}"
                                                @if($teacher->id == $allot->teacher_id)
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

