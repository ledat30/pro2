@extends('index')
@section('content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Sửa thông tin</th>
            <th>Xoá thông tin</th>
        </tr>
        </thead>
        <tbody>
                @foreach($specializeds as $specialized)
                    <tr>
                        <td>{{$specialized->id}}</td>
                        <td>{{$specialized->name_specializeds}}</td>
                        <td>
                            <a href="{{ route('specializeds.edit', $specialized->id) }}">
                                <button   class="btn btn-warning ">Edit</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('specializeds.destroy', $specialized->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </tbody>
@endsection
{{--@push('js')--}}
{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            $('#specialized-manage').addClass('menu-open');--}}
{{--            $('#specialized-list').addClass('active');--}}
{{--            $('#specialized-add').addClass('active');--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
