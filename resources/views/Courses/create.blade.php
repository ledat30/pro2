@extends('index')
@section('content')
    <div class="col-12">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Thêm khoá học</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{ route('courses.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_courses</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name_courses">
                                <span>
                                         @if($errors->any('name_courses'))
                                        {{ $errors->first('name_courses') }}
                                    @endif
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Start_date_courses</label>
                                <input type="date" class="form-control" placeholder="Start_date_courses" name="start_date_courses">
                                <span>
                                         @if($errors->any('start_date_courses'))
                                        {{ $errors->first('start_date_courses') }}
                                    @endif
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Add course</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

