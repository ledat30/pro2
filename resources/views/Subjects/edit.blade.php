@extends('index')
@section('content')
    <div class="col-12">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Sửa môn học</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{route('subjects.update', $subject->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name_subjects</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name_subjects" value="{{$subject->name_subjects}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Start_date_subjects</label>
                                <input type="date" class="form-control" placeholder="Start_date_subjects" name="start_date_subjects" value="{{$subject->start_date_subjects}}" >
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
                                           @if($specialized->id == $subject->specializeds_id)
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
                                <button type="submit" class="btn btn-info">Edit subject</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

