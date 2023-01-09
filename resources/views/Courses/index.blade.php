@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Start_date_courses</th>
            <th>Sửa thông tin</th>
            <th>Xoá thông tin</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{$course->id}}</td>
                <td>{{$course->name_courses}}</td>
                <td>{{$course-> start_date_courses}}</td>
                <td>
                    <a href="{{ route('courses.edit', $course->id) }}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
@endsection

