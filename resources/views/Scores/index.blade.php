@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name_students</th>
            <th>Name_subjects</th>
            <th>Name_teachers</th>
            <th>Score</th>
            <th>Sửa thông tin</th>
            <th>Xoá thông tin</th>
        </tr>
        </thead>
        <tbody>
        @foreach($scores as $score)
            <tr>
                <td>{{$score->id}}</td>
                <td>{{$score->name_students}}</td>
                <td>{{$score->name_subjects}}</td>
                <td>{{$score->name_teachers}}</td>
                <td>{{$score->score}}</td>
                <td>
                    <a href="{{ route('scores.edit', $score->id ) }}">
                        <button   class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('scores.destroy', $score->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
@endsection

