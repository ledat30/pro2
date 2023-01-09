@extends('index')
@section('content')
        <div class="col-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Thêm ngành học</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="{{ route('specializeds.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name_specializeds</label>
                                    <input type="text" class="form-control" placeholder="Enter name" name="name_specializeds">
                                    <span>
                                         @if($errors->any('name_specializeds'))
                                            {{ $errors->first('name_specializeds') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- text input -->
                                <div class="form-group">
                                   <button type="submit" class="btn btn-info">Add specialized</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

