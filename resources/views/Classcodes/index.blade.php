@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name_class_codes</th>
            <th>Name_specializeds</th>
            <th>Name_courses</th>
            <th>Sửa thông tin</th>
            <th>Xoá thông tin</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classcodes as $classcode)
            <tr>
                <td>{{$classcode->id}}</td>
                <td>{{$classcode->name_class_codes}}</td>
                <td>{{$classcode->name_specializeds}}</td>
                <td>{{$classcode->name_courses}}</td>
                <td>
                    <a href="{{ route('classcodes.edit', $classcode->id ) }}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('classcodes.destroy', $classcode->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
@endsection

