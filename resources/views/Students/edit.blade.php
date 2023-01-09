@extends('index')
@section('content')
    <div class="col-12">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Sửa thông tin</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{route('students.update', $student->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_students</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name_students" value="{{$student->name_students}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Date_of_birth</label>
                                <input type="date" class="form-control" placeholder="Date_of_birth" name="date_of_birth" value="{{$student->date_of_birth}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{$student->phone}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Address" name="address" value="{{$student->address}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{$student->email}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Account</label>
                                <input type="email" class="form-control" placeholder="Account" name="account" value="{{$student->account}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" value="{{$student->password}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-radio">
                                <label>Gender</label>
                                <input type="radio" class="form-radio-input" id="gender_male" value="1" name="gender"
                                       @if($student->gender == 1)
                                           checked
                                    @endif
                                >
                                <label class="form-check-label" for="gender_male">Male</label>
                                <input type="radio" class="form-radio-input" id="gender_female" value="0" name="gender"
                                       @if($student->gender == 0)
                                           checked
                                    @endif
                                >
                                <label class="form-check-label" for="gender_male">Female</label>
                                <input type="radio" class="form-radio-input" id="gender_other" value="2" name="gender"
                                       @if($student->gender == 2)
                                           checked
                                    @endif>
                                <label class="form-check-label" for="gender_other">Other</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_class_codes</label>
                                <select name="class_codes_id" >
                                    @foreach( $class_codes as $class_code )
                                        <option value="{{$class_code->id}}"
                                                @if($class_code->id == $student->class_codes_id)
                                                    selected
                                            @endif
                                        >{{$class_code->name_class_codes}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Edit student</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

