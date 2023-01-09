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
                <form method="post" action="{{route('classcodes.update',$class_code->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_class_codes</label>
                                <input type="text" class="form-control" placeholder="Name_class_codes" name="name_class_codes" value="{{$class_code->name_class_codes}}" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_specializeds</label>
                                <select name="specializeds_id" disabled>
                                    @foreach( $specializeds as $specialized )
                                        <option value="{{$specialized->id}}"
                                                @if($specialized->id == $class_code->specializeds_id)
                                                    selected
                                            @endif
                                        >{{$specialized->name_specializeds}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_courses</label>
                                <select name="courses_id" disabled>
                                    @foreach( $courses as $course )
                                        <option value="{{$course->id}}"
                                                @if($course->id == $class_code->teacher_id)
                                                    selected
                                            @endif
                                        >{{$course->name_courses}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Edit class</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

