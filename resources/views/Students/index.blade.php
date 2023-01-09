@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name_students</th>
            <th>Gender</th>
            <th>Date_of_birth</th>
            <th>Name_class_codes</th>
            <th>Sửa thông tin</th>
            <th>Xoá thông tin</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name_students}}</td>
                <td>
                    @if($student->gender == 0)
                        {{ 'Nam' }}
                    @elseif($student->gender == 1)
                        {{ 'Nữ' }}
                    @else
                        {{ 'Khác' }}
                    @endif
                </td>
                <td>{{$student->date_of_birth}}</td>
                <td>{{$student->name_class_codes}}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id )}}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('students.destroy', $student->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
@endsection

