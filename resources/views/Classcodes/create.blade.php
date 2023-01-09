@extends('index')
@section('content')
    <div class="col-12">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Thêm lớp</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{ route('classcodes.store')}}">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_class_codes</label>
                                <input type="text" class="form-control" placeholder="Name_class_codes " name="name_class_codes">
                                <span>
                                         @if($errors->any('name_class_codes'))
                                        {{ $errors->first('name_class_codes') }}
                                    @endif
                                    </span>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_specializeds</label>
                                <select name="specializeds_id">
                                    <option>-Choose-</option>
                                    @foreach( $specializeds as $specialized )
                                        <option value="{{ $specialized->id }}"> {{ $specialized->name_specializeds}} </option>
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
                                <select name="courses_id">
                                    <option>-Choose-</option>
                                    @foreach( $courses as $course )
                                        <option value="{{ $course->id }}"> {{ $course->name_courses}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Add lớp</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

