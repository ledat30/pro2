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
                <form method="post" action="{{route('teachers.update', $teacher->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_teachers</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name_teachers" value="{{$teacher->name_teachers}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Date_of_birth</label>
                                <input type="date" class="form-control" placeholder="Date_of_birth" name="date_of_birth" value="{{$teacher->date_of_birth}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{$teacher->phone}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Address" name="address" value="{{$teacher->address}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{$teacher->email}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Account</label>
                                <input type="email" class="form-control" placeholder="Account" name="account" value="{{$teacher->account}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" value="{{$teacher->password}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-radio">
                                <label>Gender</label>
                                <input type="radio" class="form-radio-input" id="gender_male" value="1" name="gender"
                                       @if($teacher->gender == 1)
                                           checked
                                    @endif
                                >
                                <label class="form-check-label" for="gender_male">Male</label>
                                <input type="radio" class="form-radio-input" id="gender_female" value="0" name="gender"
                                       @if($teacher->gender == 0)
                                           checked
                                    @endif
                                >
                                <label class="form-check-label" for="gender_male">Female</label>
                                <input type="radio" class="form-radio-input" id="gender_other" value="2" name="gender"
                                       @if($teacher->gender == 2)
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
                                <label>Name_specializeds</label>
                                <select name="specializeds_id" >
                                    @foreach( $specializeds as $specialized )
                                        <option value="{{$specialized->id}}"
                                                @if($specialized->id == $teacher->specializeds_id)
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
                                <button type="submit" class="btn btn-info">Edit teacher</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

