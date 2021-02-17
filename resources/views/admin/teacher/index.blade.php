@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ route('admin.teacher.create')}}" class="btn btn-outline-success float-right">Create</a>
        <div class="row">
            @foreach($teachers as $teacher)
                <div class="col-md-3 p-2">
                    <div class="border p-3">
                        <a href="{{ route('admin.teacher.show',$teacher->id)}}">
                            <h5 class="text-center">{{ $teacher->name }} {{ $teacher->surname }}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
