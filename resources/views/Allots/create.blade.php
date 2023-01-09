@extends('index')
@section('content')
    <div class="col-12">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Thêm phân công</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{ route('allots.store')}}">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Start_date_allots</label>
                                <input type="date" class="form-control" placeholder="Start_date_allots name" name="start_date_allots">
                                <span>
                                         @if($errors->any('start_date_allots'))
                                        {{ $errors->first('start_date_allots') }}
                                    @endif
                                    </span>
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
                                <button type="submit" class="btn btn-info">Add allot</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

