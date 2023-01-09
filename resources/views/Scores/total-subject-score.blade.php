@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Name_students</th>
            <th>Total Subject Score</th>
        </tr>
        </thead>
        <tbody>
        @foreach($totalscores as $totalscore)
            <tr>
                <td>{{$totalscore->name_students}}</td>
                <td>{{$totalscore->TotalSubjectScore}}</td>
            </tr>
        @endforeach
        </tbody>
@endsection

