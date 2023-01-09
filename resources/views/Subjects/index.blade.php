@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name_subjects</th>
            <th>Start_date_subjects</th>
            <th>Name_specializeds</th>
            <th>Sửa thông tin</th>
            <th>Xoá thông tin</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subject)
            <tr>
                <td>{{$subject->id}}</td>
                <td>{{$subject->name_subjects}}</td>
                <td>{{$subject->start_date_subjects}}</td>
                <td>{{$subject->name_specializeds}}</td>
                <td>
                    <a href="{{ route('subjects.edit', $subject->id ) }}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
@endsection

