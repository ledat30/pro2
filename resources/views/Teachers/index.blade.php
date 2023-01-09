@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name_teachers</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Name-specializeds</th>
            <th>Sửa thông tin</th>
            <th>Xoá thông tin</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{$teacher->id}}</td>
                <td>{{$teacher->name_teachers}}</td>
                <td>
                    @if($teacher->gender == 0)
                        {{ 'Nam' }}
                    @elseif($teacher->gender == 1)
                        {{ 'Nữ' }}
                    @else
                        {{ 'Khác' }}
                    @endif
                </td>
                <td>{{$teacher->phone}}</td>
                <td>{{$teacher->name_specializeds}}</td>
                <td>
                    <a href="{{ route('teachers.edit', $teacher->id )}}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
@endsection

