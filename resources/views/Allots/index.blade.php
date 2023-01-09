@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Start_date_allots</th>
            <th>Name_subjects</th>
            <th>Name_teachers</th>
            <th>Sửa thông tin</th>
            <th>Xoá thông tin</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allots as $allot)
            <tr>
                <td>{{$allot->id}}</td>
                <td>{{$allot->start_date_allots}}</td>
                <td>{{$allot->name_subjects}}</td>
                <td>{{$allot->name_teachers}}</td>
                <td>
                    <a href="{{ route('allots.edit', $allot->id ) }}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('allots.destroy', $allot->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
@endsection

